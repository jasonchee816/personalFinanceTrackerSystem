@extends('layouts.default')

@section('content')
<div class="container1">
    <div class="row align-items-center mb-4">
        <div class="col-md-6">
            <h1>Wallet Details</h1>
        </div>
        <div class="col-md-6 d-flex justify-content-end">
            <div class="text-end">
                <a href="{{ url('wallet/' . $wallet->id . '/edit') }}" class="btn btn-outline-primary"
                    style="background-color: #fff; color: #007bff;">Edit</a>
                <form action="{{ url('wallet/' . $wallet->id . '/delete') }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger" style="background-color: #fff; color: #FF0000;"
                        onclick="return confirm('Are you sure you want to delete this wallet?')">Delete</button>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4 box-shadow">
                <div class="card-body">
                    <h5 class="card-title">Name:</h5>
                    <p class="card-text">{{ $wallet->name }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 box-shadow">
                <div class="card-body text-right">
                    <h5 class="card-title">Balance:</h5>
                    <p class="card-text">RM {{ $wallet->balance }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 box-shadow">
                <div class="card-body text-right">
                    <h5 class="card-title">Type:</h5>
                    <p class="card-text">{{ $wallet->type }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="transHistory">
        <table class="table table-striped table-hover mx-auto" style="width:96%; text-align: center;">
            <h1>Transactions History</h1>
            <thead>
                <tr class="table-dark">
                    <th>No.</th>
                    <th>Amount</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Date</th>
                </tr>
            </thead>
            @foreach($transData as $key=>$data)
            @foreach($categoryData as $cat)
            @if($cat['id'] == $data['category'])

            <!-- {{$cat_name = $cat['name']}} -->
            <tr class="rowEdit" data-href="{{ url('/editTrans/' . $data->id) }}">
                <td>{{ $key+1 }}</td>
                @if($data->getCategory()->first()->type == 'income')
                <td style="color: green;">+ {{ number_format($data->amount, 2) }}</td>
                @else
                <td style="color: red;">- {{ number_format($data->amount, 2) }}</td>
                @endif
                <td>{{ $data->description ?? '-'}}</td>
                <td>{{$cat_name}} </td>
                <td>{{date('d-m-Y', strtotime($data->trans_date));}}</td>
            </tr>

            @endif
            @endforeach
            @endforeach
        </table>
    </div>
</div>
@endsection
<script>
    document.addEventListener("DOMContentLoaded", function (event) {
        document.querySelectorAll('.rowEdit').forEach(function(row) {
            row.addEventListener('click', function() {
                console.log(this.dataset.href);
                window.location.href = this.dataset.href;
            });
        });
    });
</script>
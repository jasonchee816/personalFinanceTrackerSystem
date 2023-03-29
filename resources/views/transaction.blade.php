@extends('layouts.default')

@section('content')
<div class="container1">
    <h1> Transaction Overview</h1>
    <div class="row mb-3">
        @if($transactions->count() == 0)
        <span>
            You have no recent transactions.
        </span>
        @endif

        <div class="row text-center">
            <div class="col-md-6 mt-3">
                <div class="card box-shadow p-2 walletBtn text-start mb-4" style="background-color: #406E8E;">
                    <div class="card-body">
                        <h5 class="card-title text-white" style="margin-bottom: 0.5rem;">Total income</h5>
                        <h6 class="card-subtitle mb-2 text-white"><i class="fas fa-coins"></i> RM {{ $income}}</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-3">
                <div class="card box-shadow p-2 walletBtn text-start mb-4" style="background-color: #406E8E;">
                    <div class="card-body">
                        <h5 class="card-title text-white" style="margin-bottom: 0.5rem;">Total expenses</h5>
                        <h6 class="card-subtitle mb-2 text-white"><i class="fas fa-coins"></i> RM {{ $expense}}</h6>
                    </div>
                </div>
            </div>
        </div>

        <table class="table">
            <h1>Recent Transactions</h1>
            <thead>
                <tr class="table-dark">
                    <th>No</th>                    
                    <th>Amount</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Date</th>

                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $key=>$data)
                    {{--@if($data->category == $category->id)--}}
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $data->amount }}</td>
                        <td>{{ $data->description }}</td>
                        {{--<td>{{ $category->name }}</td>--}}
                        <td>{{date('d-m-Y', strtotime($data->trans_date));}}</td>

                    </tr>
                    {{--@endif--}}
                @endforeach
            </tbody>
        </table>

        <a href="createTrans" class="mb-4 btn">
            <div class="card box-shadow p-2 walletBtn text-start" style="background-color: #406E8E;">
                <div class="card-body">
                    <h5 class="card-title text-white">+ Add New Transaction</h5>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection

<script src="{{asset('js/wallet.js')}}"></script>
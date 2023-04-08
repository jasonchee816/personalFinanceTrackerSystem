@extends('layouts.default')

@section('content')

@can('view', $wallet)
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
                        onclick="return confirm('Are you sure you want to delete this wallet? All related transactions will be deleted too! ')">Delete</button>
                </form>
            </div>
        </div>
    </div>

    @if($transData->count() != 0)
    <div class="row">
        <div class="col-4">
            <canvas id="myChart"></canvas>
        </div>
        <div class="col-4">
            <canvas id="myChart2"></canvas>
        </div>
        <div class="col-4">
            <canvas id="myChart3"></canvas>
        </div>
    </div>

    <script src="{{asset('js/transactionsWalletDetails.js')}}"></script>

    @endif


    <div class="row text-center">
        <div class="col-md-6 mt-3">
            <div class="card box-shadow p-2 walletBtn text-start mb-4" style="background-color: #406E8E;">
                <div class="card-body">
                    <h5 class="card-title text-white" style="margin-bottom: 0.5rem;">Total income</h5>
                    <h6 class="card-subtitle mb-2 text-white"><i class="fas fa-coins"></i> RM {{
                        number_format($income, 2)}}</h6>
                </div>
            </div>
        </div>
        <div class="col-md-6 mt-3 flex-end">
            <div class="card box-shadow p-2 walletBtn text-start mb-4" style="background-color: #406E8E;">
                <div class="card-body">
                    <h5 class="card-title text-white" style="margin-bottom: 0.5rem;">Total expenses</h5>
                    <h6 class="card-subtitle mb-2 text-white"><i class="fas fa-coins"></i> RM {{
                        number_format($expense, 2)}}</h6>
                </div>
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
                    <p class="card-text">RM {{ number_format($wallet->balance, 2) }}</p>
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
            @if($transData->count() == 0)
            <tr>
                <td colspan="5">You have no recent Transactions on this Wallet.</td>
            </tr>
            @endif
        </table>
    </div>

    <a href="/createTrans" class="mb-4 btn">
        <div class="card box-shadow p-2 walletBtn text-start" style="background-color: #406E8E;">
            <div class="card-body">
                <h5 class="card-title text-white">+ Add New Transaction</h5>
            </div>
        </div>
    </a>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function (event) {
        document.querySelectorAll('.rowEdit').forEach(function (row) {
            row.addEventListener('click', function () {
                console.log(this.dataset.href);
                window.location.href = this.dataset.href;
            });
        });
    });
</script>

@else
<div class="mt-5 pt-5 mx-auto text-center">
    You are not Authorized to View this Wallet!
</div>
@endcan

<script>
    var income = @json($income);
    var expense = @json($expense);
    var incomeCategory = @json($incomeCategory);
    var incomeAmountGrouped = @json($incomeAmountGrouped);
    var expenseCategory = @json($expenseCategory);
    var expenseAmountGrouped = @json($expenseAmountGrouped);
</script>

@stop
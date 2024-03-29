@extends('layouts.default')

@section('content')
<div class="container1">
    <h1> Transactions</h1>
    <div class="row mb-3">
        @if($transactions->count() != 0)
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

        <table class="table table-striped table-hover mx-auto" style="width:96%; text-align: center;">
            <h1>Transactions List</h1>
            <thead>
                <tr class="table-dark">
                    <th>No</th>
                    <th>Amount (RM)</th>
                    <th>Description</th>
                    <th>Wallet</th>
                    {{--<th>Type</th>--}}
                    <th>Category</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @if($transactions->count() == 0)
                <tr>
                    <td colspan="6">You have no Recent Transactions!</td>
                </tr>
                @endif
                @foreach($transactions as $key=>$data)
                <tr class="rowEdit" data-href="{{ url('/editTrans/' . $data->id) }}">
                    <td>{{ $key+1 }}</td>
                    @if($data->getCategory()->first()->type == 'income')
                    <td style="color: green;">+ {{ number_format($data->amount, 2) }}</td>
                    @else
                    <td style="color: red;">- {{ number_format($data->amount, 2) }}</td>
                    @endif
                    <td>{{ $data->description ?? '-'}}</td>

                    <td>{{ $data->getWallet()->first()->name }}</td>
                    {{--<td>{{ ucfirst($data->getCategory()->first()->type) }}</td>--}}
                    <td>{{ $data->getCategory()->first()->name }}</td>
                    <td>{{date('d-m-Y', strtotime($data->trans_date));}}</td>

                </tr>
                @endforeach
            </tbody>
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
    var income = @json($income);
    var expense = @json($expense);
    var incomeCategory = @json($incomeCategory);
    var incomeAmountGrouped = @json($incomeAmountGrouped);
    var expenseCategory = @json($expenseCategory);
    var expenseAmountGrouped = @json($expenseAmountGrouped);
</script>

@stop
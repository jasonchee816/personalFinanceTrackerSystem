@extends('layouts.default')

@section('content')
<div id="home" class="container0">
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
    <h1>Hi, {{auth()->user()->name}} </h1>
</div>
<div class="text-center">
    <div class="row" style="width:100%">
        <div class="mt-3 d-block d-md-none">
            <a href="createWallet" class="mb-4 btn col-10">
                <div class="card box-shadow walletBtn text-start p-3" style="background-color: #406E8E;">
                    <div class="card-body">
                        <h5 class="card-title text-center text-white">+ Add New Wallet</h5>
                    </div>
                </div>
            </a>

            <a href="/createTrans" class="mb-4 btn col-10">
                <div class="card box-shadow p-3 walletBtn text-start" style="background-color: #406E8E;">
                    <div class="card-body">
                        <h5 class="card-title text-center text-white">+ Add New Transaction</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 mt-3">
            <h1>Wallets</h1>
            @if($wallets->count() == 0)
            <span>
                You have not yet registered any wallets.
            </span>
            @endif
            @foreach($wallets as $wallet)
            <a href="{{ url('wallet/' . $wallet->id . '/details') }}" class="mb-4 btn col-10">
                <div class="card box-shadow p-2 walletBtn text-start" style="background-color: #406E8E;">
                    <div class="card-body">
                        <h5 class="card-title text-white" style="margin-bottom: 0.5rem;">{{ $wallet->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-white"><i class="fas fa-coins"></i> RM {{
                            number_format($wallet->balance , 2)}}
                        </h6>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        <div class="col-md-4 mt-3">
            <h1>Recent Transactions</h1>
            @if($transactions->count() == 0)
            <span>
                You have no recent transactions.
            </span>
            @endif
            @foreach($transactions as $transaction)
            <a href="{{ url('/editTrans/' . $transaction->id) }}" class="mb-4 btn col-10">
                <div class="card box-shadow p-2 walletBtn text-start" style="background-color: #406E8E;">
                    <div class="card-body">
                        <h5 class="card-title text-white" style="margin-bottom: 0.5rem;">{{date('d-m-Y',
                            strtotime($transaction->trans_date));}}</h5>
                        <h6 class="card-subtitle mb-2 text-white"><i class="fas fa-coins"></i> RM {{
                            number_format($transaction->amount, 2) }}
                        </h6>
                    </div>
                </div>
            </a>
            @endforeach
            {{$transactions->links()}}
        </div>
        <div class="col-md-4 mt-3 pt-5 d-none d-md-block">
            <a href="createWallet" class="mb-4 btn col-10">
                <div class="card box-shadow p-2 walletBtn text-start py-5" style="background-color: #406E8E;">
                    <div class="card-body">
                        <h5 class="card-title text-white">+ Add New Wallet</h5>
                    </div>
                </div>
            </a>

            <a href="/createTrans" class="mb-4 btn col-10">
                <div class="card box-shadow p-2 walletBtn text-start py-5" style="background-color: #406E8E;">
                    <div class="card-body">
                        <h5 class="card-title text-white">+ Add New Transaction</h5>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
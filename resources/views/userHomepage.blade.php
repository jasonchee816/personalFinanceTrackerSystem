@extends('layouts.default')

@section('content')
<div class="container0">
    <h1>Hi, {{auth()->user()->name}} </h1>
</div>
<div class="row text-center">
    <div class="col-md-4 ">
        <h1>Wallets</h1>
        @foreach($wallets as $wallet)
        <a href="{{ url('wallet/' . $wallet->id . '/details') }}" class="mb-4 btn col-10">
            <div class="card box-shadow p-2 walletBtn text-start" style="background-color: #406E8E;">
                <div class="card-body">
                    <h5 class="card-title text-white" style="margin-bottom: 0.5rem;">{{ $wallet->name }}</h5>
                    <h6 class="card-subtitle mb-2 text-white"><i class="fas fa-coins"></i> RM {{ $wallet->balance }}</h6>
                </div>
            </div>
        </a>
        @endforeach
    </div>
    <div class="col-md-4">
        <h1>Transactions</h1>
        @foreach($transactions as $transaction)
        <a href="{{ url('wallet/' . $wallet->id . '/details') }}" class="mb-4 btn col-10">
            <div class="card box-shadow p-2 walletBtn text-start" style="background-color: #406E8E;">
                <div class="card-body">
                    <h5 class="card-title text-white" style="margin-bottom: 0.5rem;">{{date('d-m-Y', strtotime($transaction->trans_date));}}</h5>
                    <h6 class="card-subtitle mb-2 text-white"><i class="fas fa-coins"></i> RM {{ $transaction->amount }}</h6>
                </div>
            </div>
        </a>
        @endforeach
    </div>
    <div class="col-md-4 pt-5">
        <a href="createWallet" class="mb-4 btn col-10">
            <div class="card box-shadow p-2 walletBtn text-start py-5" style="background-color: #406E8E;">
                <div class="card-body">
                    <h5 class="card-title text-white">+ Add New Wallet</h5>
                </div>
            </div>
        </a>

        <a href="createTrans" class="mb-4 btn col-10">
            <div class="card box-shadow p-2 walletBtn text-start py-5" style="background-color: #406E8E;">
                <div class="card-body">
                    <h5 class="card-title text-white">+ Add New Transaction</h5>
                </div>
            </div>
        </a>
    </div>
</div>
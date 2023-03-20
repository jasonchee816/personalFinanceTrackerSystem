@extends('layouts.default')

@section('content')
<div class="container1">
    <h1>Hi, {{}}</h1>
    <a href="createWallet" class="mb-4 btn">
        <div class="card box-shadow p-2 walletBtn text-start" style="background-color: #1D7874;">
            <div class="card-body">
                <h5 class="card-title text-white">+ Add New Wallet</h5>
            </div>
        </div>
    </a>
    <a href="createTrans" class="mb-4 btn">
        <div class="card box-shadow p-2 walletBtn text-start" style="background-color: #1D7874;">
            <div class="card-body">
                <h5 class="card-title text-white">+ Add New Transaction</h5>
            </div>
        </div>
    </a>
</div>
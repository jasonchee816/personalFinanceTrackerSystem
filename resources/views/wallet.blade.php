@extends('layouts.default')

@section('content')
<div class="container1">
    <h1>Wallets:</h1>
    <div class="row mb-3">
        @foreach($wallets as $wallet)
        <a href="{{ url('wallet/' . $wallet->id . '/details') }}" class="mb-4 btn">
            <div class="card box-shadow p-2 walletBtn text-start" style="background-color: #1D7874;">
                <!-- <i class="fas fa-pen"></i> -->
                <div class="card-body">
                    <h5 class="card-title text-white" style="margin-bottom: 0.5rem;">{{ $wallet->name }}</h5>
                    <h6 class="card-subtitle mb-2 text-white"><i class="fas fa-coins"></i> RM {{
                        number_format($wallet->balance, 2) }}</h6>
                </div>
            </div>
        </a>
        @endforeach
        <a href="createWallet" class="mb-4 btn">
            <div class="card box-shadow p-2 walletBtn text-start" style="background-color: #1D7874;">
                <div class="card-body">
                    <h5 class="card-title text-white">+ Add New Wallet</h5>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection

<script src="{{asset('js/wallet.js')}}"></script>
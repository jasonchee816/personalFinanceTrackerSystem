@extends('layouts.default')

@section('content')
<div class="container1">
    <h1>Wallets</h1>
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
    <div class="row mb-3">
        <div class="col-6">
            <canvas id="balanceChart"></canvas>
        </div>
        <div class="col-6">
            <canvas id="typeChart"></canvas>
        </div>
    </div>

    <div class="row mb-3">
        <h1>Wallets List</h1>
        @foreach($wallets as $wallet)
        <a href="{{ url('wallet/' . $wallet->id . '/details') }}" class="mb-4 btn">
            <div class="card box-shadow p-2 walletBtn text-start" style="background-color: #406E8E;">
                <!-- <i class="fas fa-pen"></i> -->
                <div class="card-body">
                    <h5 class="card-title text-white mb-3">{{ $wallet->name }}</h5>
                    <p class="card-subtitle mb-1 text-white">{{$wallet->type}}</p>
                    <p class="card-subtitle mb-1 text-white"><i class="fas fa-coins"></i> RM {{
                        number_format($wallet->balance, 2) }}</p>
                </div>
            </div>
        </a>
        @endforeach
        <a href="createWallet" class="mb-4 btn">
            <div class="card box-shadow p-2 walletBtn text-start" style="background-color: #406E8E;">
                <div class="card-body">
                    <h5 class="card-title text-white">+ Add New Wallet</h5>
                </div>
            </div>
        </a>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
    crossorigin="anonymous"></script>

<script src="{{ asset('js/wallet.js') }}"></script>

@stop
@section('scripts')
@endsection
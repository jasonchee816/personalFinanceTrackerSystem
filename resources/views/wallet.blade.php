@extends('layouts.default')

@section('content')
<div class="container1">
    <h1>Wallets:</h1>
    <div class="row"><br>
        @foreach($wallets as $wallet)
            <a href="{{ url('wallet/' . $wallet->id . '/details') }}">Card Details </a>
            <div class="card mb-4 box-shadow" style="background-color: #1D7874">
                <a href="{{ url('wallet/' . $wallet->id . '/edit') }}" class="btn btn-sm btn-outline-light" style="position: absolute; top: 5px; right: 5px;">
                    <i class="fas fa-pen"></i>
                </a>
                <div class="card-body">
                    <h5 class="card-title text-white" style="margin-bottom: 0.5rem;">{{ $wallet->name }}</h5>
                    <h6 class="card-subtitle mb-2 text-white"><i class="fas fa-coins"></i> MYR {{ $wallet->balance }}</h6>
                </div>
            </div>
        @endforeach
        <div class="col-md-2">
            <a href="createWallet">
                <div class="card mb-4 box-shadow" style="background-color: #FFFFFF" >
                    <div class="card-body">
                        <h5 class="card-title">+ Add Wallet</h5>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection

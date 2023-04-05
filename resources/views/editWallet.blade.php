@extends('layouts.default')

@section('content')
<div class = container1>

    <h1>Edit wallet</h1>

    <form action="/updateWallet" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $wallet->id }}">

        <div class="form-group">
            <label for="wallet"><i class="fas fa-wallet"></i>Wallet Name</label>
            <input type="text" name="wallet" id="wallet" class="form-control" value="{{ $wallet->name }}">
            <span style="color:red">@error('wallet'){{$message}}@enderror</span>
        </div>

        <div class="form-group">
            <label for="initial_balance">initial_balance</label>
            <input type="text" name="initial_balance" id="initial_balance" class="form-control" value="{{ $wallet->initial_balance }}">
            <span style="color:red">@error('initial_balance'){{$message}}@enderror</span>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection

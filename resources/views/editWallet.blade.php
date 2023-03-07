@extends('layouts.default')

@section('content')
<div class = container1>

    <h1>Edit wallet</h1>

    <form action="/updateWallet" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $wallet->id }}">

        <div class="form-group">
            <label for="name"><i class="fas fa-wallet"></i>Wallet Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $wallet->name }}">
        </div>

        <div class="form-group">
            <label for="balance">Balance</label>
            <input type="text" name="balance" id="balance" class="form-control" value="{{ $wallet->balance }}">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection

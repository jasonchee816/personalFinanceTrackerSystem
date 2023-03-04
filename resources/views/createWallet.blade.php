@extends('layouts.default')

@section('content')

<div class = container1>
    <h1>Create New Wallet</h1>
    <form action="cWallet" method="POST">
    @csrf
        <label for="wallet"><i class="fas fa-wallet"></i> Wallet name:</label>
        <input type="text" class="form-control" id="wallet" placeholder="Name" name="wallet">
        <span style="color:red">@error('wallet'){{$message}}@enderror</span><br>

        <label id="category" ><i class="fa-solid fa-list"></i> Wallet type:</label>
        <select class="form-select" id="category" name="category">
            <option disabled selected>Choose your wallet type</option>
            <option>Savings Account</option>
            <option>e-Wallet</option>
            <option>Credit Card</option>
        </select>
        <span style="color:red">@error('category'){{$message}}@enderror</span><br>


        <label id="amount" ><i class="fa-solid fa-money-bill"></i> Initial Balance:</label>
        <div class="input-group">
            <span class="input-group-text">RM</span>
            <input type="text" class="form-control" id="amount" placeholder="0.00" name="amount" ><br>
        </div>
        <br>
        <div class = "d-grid gap-2 col-3 mx-auto">
            <button type="submit" class="btn btn-primary">Save Wallet</button>
        </div>
    </form>

</div>
@stop
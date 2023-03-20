@extends('layouts.default')

@section('content')

<div class = container1>
    <h1>Create New Wallet</h1>
    <form id="my-form" action="wallet/form" method="POST">
    @csrf
    <div class="walletNameInput mb-4">
        <label for="wallet"><i class="fas fa-wallet"></i> Wallet name</label>
        <input type="text" class="form-control" id="wallet" placeholder="Name" name="wallet" value={{old('wallet')}}>
        <span style="color:red">@error('wallet'){{$message}}@enderror</span>
    </div>

    <div class="categoryInput mb-4">
        <label id="category" ><i class="fa-solid fa-list"></i> Wallet type</label>
        <select class="form-select" id="category" name="category">
            @if (old('category') == '')
            <option disabled value="" selected="selected">Choose your wallet type</option>
            @else
            <option disabled value="">Choose your wallet type</option>
            @endif
            @if (old('category') == 'Savings Account')
            <option value='Savings Account' selected>Savings Account</option>
            @else
            <option value='Savings Account' >Savings Account</option>
            @endif

            @if (old('category') == 'e-Wallet')
            <option value='e-Wallet' selected>e-Wallet</option>
            @else
            <option value='e-Wallet' >e-Wallet</option>
            @endif

            @if (old('category') == 'Credit Card')
            <option value='Credit Card' selected>Credit Card</option>
            @else
            <option value='Credit Card' >Credit Card</option>
            @endif
        </select>
        <span style="color:red">@error('category'){{$message}}@enderror</span>
    </div>

    <div class="balanceInput mb-4">
    <label for="amount"><i class="fa-solid fa-money-bill"></i> Initial Balance</label>
        <div class="input-group">
            <span class="input-group-text">RM</span>
            <input type="text" class="form-control" id="amount" placeholder="0.00" name="amount" value={{old('amount')}}>
        </div>
        <span style="color:red">@error('amount'){{$message}}@enderror</span>

        <br>
        <div class = "d-grid gap-2 col-3 mx-auto">
            <button type="submit" class="btn btn-primary">Save Wallet</button>
        </div>
    </div>
    </form>

</div>
@stop


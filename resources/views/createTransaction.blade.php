@extends('layouts.default')

@section('content')

@if($errors->any())
    @foreach($errors->all() as $errors)
        <li> <span style="color:red;font-weight:bold">{{$errors}}</span></li>
    @endforeach
@endif
<div class = container1>
    <h1>Create New Transaction</h1>
    <form action="createTransaction" method="POST">
    @csrf
        <label for="wallet"><i class="fas fa-wallet"></i> Select Wallet:</label>
        <select class="form-select" id="wallet" name="wallet">
            <option>Cash</option>
            <option>Touch N Go</option>
            <option>Card</option>
        </select>
        <br>

        <label id="category" ><i class="fa-solid fa-list"></i> Select Category:</label><br>
        <select class="form-select" id="category" name="category">
            <option>Food & Beverage</option>
            <option>Education</option>
            <option>Entertainment</option>
            <option>Medical</option>
            <option>Utilities</option>
            <option>Salary</option>
            <option>Investment Return</option>
            <option>Gifts</option>
            <option>Loans</option>
            <option>Others</option>
        </select>

        <br>

        <label id="amount" ><i class="fa-solid fa-money-bill"></i> Amount:</label><br>
        <input type="text" class="form-control" id="amount" placeholder="RM 0.00" name="amount"><br>

        <label id="date" ><i class="fa-solid fa-calendar-days"></i> Select Date:</label><br>
        <input type="date" class="form-control" id="date" placeholder="" name="date"><br>

        <label id="desc"><i class="fa-duotone fa-notes"></i> Description:</label><br>
        <input type="text" class="form-control" id="desc" placeholder="Optional" name="desc"><br>
        
        <div class = "d-grid gap-2 col-3 mx-auto">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    
</div>
@stop
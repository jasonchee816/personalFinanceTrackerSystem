@extends('layouts.default')

@section('content')

<div class=container1>
    <h1>Add New Transaction</h1>
    <form action="trans" method="POST">
        @csrf
        @if($errors->any())
        @foreach($errors->all() as $errors)
        <li> <span style="color:red;font-weight:bold">{{$errors}}</span></li>
        @endforeach
        @endif
        <div class="typeInput mb-4 mt-3">
            <label for="transType"><i class=""></i> Select Transaction Type</label>

            <select class="form-select mt-2" id="transTypeVal" name="transType">
                <option disabled selected>Please select</option>
                <option>Income</option>
                <option>Expense</option>
            </select>
        </div>

        <div class="showAfterType" hidden>
            <div class="walletInput mb-4 mt-3">
                <label for="wallet"><i class="fas fa-wallet"></i> Select Wallet</label>

                <select class="form-select mt-2" id="walletVal" name="wallet">
                    <option disabled selected>Please select</option>
                    <option>Cash</option>
                    <option>Touch N Go</option>
                    <option>Card</option>
                </select>
            </div>

            <div class="categoryInput mb-4">
                <label for="category"><i class="fa-solid fa-list"></i> Select Category</label><br>
                <select class="form-select mt-2" id="categoryVal" name="category">
                    <option disabled selected>Please select</option>
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
            </div>

            <div class="amountInput mb-4">
                <label for="amount"><i class="fa-solid fa-money-bill"></i> Amount (RM)</label><br>
                <input type="text" class="form-control mt-2" id="amountVal" placeholder="0.00" name="amount">
            </div>

            <div class="dateInput mb-4">
                <label for="date"><i class="fa-solid fa-calendar-days"></i> Select Date</label><br>
                <input type="date" class="form-control mt-2" id="dateVal" value="" name="date"
                    onfocus="this.showPicker()">
            </div>

            <div class="descInput mb-4">
                <label for="desc"><i class="fa-duotone fa-notes"></i> Description (Optional)</label><br>
                <input type="text" class="form-control mt-2" id="descVal" placeholder="Dinner with Family, etc. "
                    name="desc"><br>
            </div>
        </div>




        <div class="d-grid col-3 mx-auto">
            <button type="submit" class="btn btn-primary showAfterType" hidden>Add new Transaction </button>
            <button type="submit" class="btn btn-outline-primary mt-3">Cancel</button>
        </div>
    </form>

</div>

<script src="{{asset('js/createTransaction.js')}}"></script>
@stop
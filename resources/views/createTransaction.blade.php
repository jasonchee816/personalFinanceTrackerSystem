@extends('layouts.default')

@section('content')

<div class=container1>
    <h1>Add New Transaction</h1>
    <form action="createTrans" method="POST">
        @csrf
        @if($errors->any())
        @foreach($errors->all() as $errors)
        <li> <span style="color:red;font-weight:bold">{{$errors}}</span></li>
        @endforeach
        @endif
        <div class="typeInput mb-4 mt-3">
            <label for="transactionType"><i class=""></i> Select Transaction Type</label>

            <select class="form-select mt-2" id="transactionType" name="transactionType">
                <option disabled value="" selected="selected">Please select</option>
                <option value="income">Income</option>
                <option value="expense">Expense</option>
            </select>
        </div>

        <div class="showAfterType">
            <div class="walletInput mb-4 mt-3">
                <label for="wallet"><i class="fas fa-wallet"></i> Select Wallet</label>

                <select class="form-select mt-2" id="walletVal" name="walletVal">
                    <option disabled selected>Please select</option>
                    @foreach($walletData as $wallet)
                        @if (old('walletVal') == $wallet->id)
                            <option selected value={{$wallet['id']}}>{{$wallet['name']." (".$wallet['type'].")"}}</option>
                        @else
                            <option value={{$wallet['id']}}>{{$wallet['name']." (".$wallet['type'].")"}}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="categoryInput mb-4">
                <label for="category"><i class="fa-solid fa-list"></i> Select Category</label><br>
                <select class="form-select mt-2" id="category" name="category">
                </select>
            </div>

            <div class="amountInput mb-4">
                <label for="amount"><i class="fa-solid fa-money-bill"></i> Amount (RM)</label><br>
                <input type="text" class="form-control mt-2" id="amount" placeholder="0.00" name="amount" value={{old('amount')}}>
            </div>

            <div class="dateInput mb-4">
                <label for="date"><i class="fa-solid fa-calendar-days"></i> Select Date</label><br>
                <input type="date" class="form-control mt-2" id="transactionDate" name="transactionDate" onfocus="this.showPicker()" 
                    value={{old('transactionDate')}} >
            </div>
            <div class="descInput mb-4">
                <label for="desc"><i class="fa-duotone fa-notes"></i> Description (Optional)</label><br>
                <input type="text" class="form-control mt-2" id="description" placeholder="Dinner with Family, etc. "
                    name="description" value={{old('description')}}><br>
            </div>
        </div>




        <div class="d-grid col-3 mx-auto">
            <button type="submit" class="btn btn-primary showAfterType">Add new Transaction </button>
            <button type="submit" class="btn btn-outline-primary mt-3">Cancel</button>
        </div>
    </form>

</div>

<script>
    // let walletData =@json($walletData);
    var categoryData =@json($categoryData);

</script>
<script src="{{asset('js/createTransaction.js')}}"></script>


@stop
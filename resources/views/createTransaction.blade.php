@extends('layouts.default')

@section('content')

<div class=container1>
    <h1>Add New Transaction</h1>
    <form action="/createTrans" method="POST">
        @csrf

        <div class="typeInput mb-4 mt-3">
            <label for="transactionType"><i class=""></i> Select Transaction Type</label>

            <select class="form-select mt-2" id="transactionType" name="transactionType">
                @if (old('transactionType') == '')
                <option disabled value="" selected="selected">Please select</option>
                @else
                <option disabled value="">Please select</option>
                @endif
                @if (old('transactionType') == 'income') 
                <option value='income' selected>Income</option>
                @else
                <option value="income">Income</option>
                @endif
                @if (old('transactionType') == 'expense')
                <option value='expense' selected>Expense</option>
                @else
                <option value="expense">Expense</option>
                @endif
            </select>
        </div>

        <div class="showAfterType">
            <div class="walletInput mb-4 mt-3">
                <label for="wallet"><i class="fas fa-wallet"></i> Select Wallet</label>

                <select class="form-select mt-2" id="wallet" name="wallet">
                    <option disabled selected>Please select</option>
                    @foreach($walletData as $wallet)
                    @if (old('wallet') == $wallet->id)
                    <option selected value={{$wallet['id']}}>{{$wallet['name']." (".$wallet['type'].")"}}</option>
                    @else
                    <option value={{$wallet['id']}}>{{$wallet['name']." (".$wallet['type'].")"}}</option>
                    @endif
                    @endforeach
                </select>
                <span style="color:red">@error('wallet'){{$message}}@enderror</span>
            </div>

            <div class="categoryInput mb-4">
                <label for="category"><i class="fa-solid fa-list"></i> Select Category</label><br>
                <select class="form-select mt-2" id="category" name="category">
                </select>
                <span style="color:red">@error('category'){{$message}}@enderror</span>
            </div>

            <div class="amountInput mb-4">
                <label for="amount"><i class="fa-solid fa-money-bill"></i> Amount (RM)</label><br>
                <input type="text" class="form-control mt-2" id="amount" placeholder="0.00" name="amount"
                    value={{old('amount')}}>
                <span style="color:red">@error('amount'){{$message}}@enderror</span>
            </div>

            <div class="dateInput mb-4">
                <label for="date"><i class="fa-solid fa-calendar-days"></i> Select Date</label><br>
                <input type="date" class="form-control mt-2" id="transactionDate" name="transactionDate"
                    onfocus="this.showPicker()" value={{old('transactionDate')}}>
                <span style="color:red">@error('transactionDate'){{$message}}@enderror</span>
            </div>
            <div class="descInput mb-4">
                <label for="desc"><i class="fa-duotone fa-notes"></i> Description (Optional)</label><br>
                <input type="text" class="form-control mt-2" id="description" placeholder="Dinner with Family, etc. "
                    name="description" value={{old('description')}}>
                <span style="color:red">@error('description'){{$message}}@enderror</span>

            </div>
        </div>




        <div class="d-grid col-3 mx-auto">
            <button type="submit" class="btn btn-primary showAfterType">Add new Transaction </button>
            <a href="{{ back()->getTargetUrl()}}" class="btn btn-outline-primary mt-3" >Cancel</a>
        </div>
    </form>

</div>

<script>
    var categoryData =@json($categoryData);
    var oldCategory = "{{old('category')}}";
</script>
<script src="{{asset('js/createTransaction.js')}}"></script>


@stop
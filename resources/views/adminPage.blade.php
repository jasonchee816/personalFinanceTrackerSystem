@extends('layouts.default')

@section('content')
<div id="home" class="container0">
    <h1>LMEO COMPANY</h1>
    <h3>Personal Finance Tracker</h3>
    <h3>(Admin Page)</h3>
</div>

<div class="container1">
    @if($transByCat->count() == 0)
    <span>
        You have no recent transactions.
    </span>
    @endif

    <div class="row mb-5">
        <div class="col-6">
            <canvas id="myChart2"></canvas>
        </div>
        <div class="col-6">
            <canvas id="myChart3"></canvas>
        </div>
    </div>
        
    <h2>Total Amount and frequency of each Category</h2>

    <table class="table table-striped table-hover mb-4">
        <thead class="table-dark">
            <tr>
                <th>Category Name</th>
                <th>Transaction Type</th>
                <th>Total Amount</th>
                <th>Frequency</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transByCat->keys() as $cat)
            <tr>
                <td>{{$cat}}</td>
                <td class="text-capitalize">{{$transByCat[$cat][0]->type}}</td>
                <td>{{$transByCat[$cat]['totalPrice']}}</td>
                <td>{{count($transByCat[$cat])}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Total Balance and User of each Wallet Type</h2>

    <table class="table table-striped table-hover mb-4">
        <thead class="table-dark">
            <tr>
                <th>Wallets Type</th>
                <th>Total Balance</th>
                <th>Frequency of wallet</th>
                <th>Number of User</th>
            </tr>
        </thead>
        <tbody>
            @foreach($userByType->keys() as $type)
            <tr>
                <td>{{$type}}</td>
                <td>{{$userByType[$type]['totalBalance']}}</td>
                <td>{{count($userByType[$type])}}</td>
                <td>{{$userByType[$type]->userNum}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{--<h2>Operation</h2>
    <a href="createCategory" class="mb-4 btn">
        <div class="card box-shadow p-2 walletBtn text-start" style="background-color: #1D7874;">
            <div class="card-body">
                <h5 class="card-title text-white">+ Create New Category</h5>
            </div>
        </div>
    </a>
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Category Name (A-Z)</th>
                <th>Category Type</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($category->sortBy('name') as $categories)
            <tr>
                <td>{{$categories['name']}}</td>
                <td>{{$categories['type']}}</td>
                <td>
                    <a href="passCategory/{{$categories['id']}}" class="btn btn-primary btn-sm">Update</a>
                </td>
                <td>
                    <a href="deleteCategory/{{$categories['id']}}" class="btn btn-danger btn-sm mr-2">Delete</a>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>--}}
</div>



<script>
    var eachCat = @json($eachCat);
    var totalAmountCat = @json($totalAmountCat);
    var eachType = @json($eachType);
    var userNumType = @json($userNumType);

</script>
<script src="{{asset('js/admin.js')}}"></script>
<script src="{{asset('js/homepage.js')}}"></script>
@stop
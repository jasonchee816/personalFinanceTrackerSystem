@extends('layouts.default')

@section('content')
<div class="container1">
    <div class="row align-items-center mb-4">
        <div class="col-md-6">
            <h1>Wallet Details</h1>
        </div>
        <div class="col-md-6 text-md-right">
        <a href="{{ url('wallet/' . $wallet->id . '/edit') }}" class="btn btn-outline-primary" style="background-color: #fff; color: #007bff;">Edit</a>
        <a href="{{ url('wallet/' . $wallet->id . '/delete') }}" class="btn btn-outline-danger" style="background-color: #fff; color: #FF0000;">Delete</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4 box-shadow">
                <div class="card-body">
                    <h5 class="card-title">Name:</h5>
                    <p class="card-text">{{ $wallet->name }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 box-shadow">
                <div class="card-body text-right">
                    <h5 class="card-title">Balance:</h5>
                    <p class="card-text">MYR {{ $wallet->balance }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 box-shadow">
                <div class="card-body text-right">
                    <h5 class="card-title">Type:</h5>
                    <p class="card-text">{{ $wallet->type }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="card mb-4 box-shadow" style="background-color: #f9f9f9">
            <div class="col-md-12">
                <h1>Transaction History</h1>
            </div>
        </div>
    </div>
</div>
@endsection

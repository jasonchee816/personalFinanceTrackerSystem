@extends('layouts.default')

@section('content')
<div id="home" class="container0">
    <h1>LMEO COMPANY</h1>
    <h3>Personal Finance Tracker</h3>
    <h3>(Admin Page)</h3>
</div>

<div class="container1">
    \
    <h2>Operation</h2>
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

            </tr>
            @endforeach
        </tbody>
    </table>
</div>




<script src="{{asset('js/homepage.js')}}"></script>
@stop
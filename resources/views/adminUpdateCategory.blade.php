@extends('layouts.default')

@section('content')

<div class="container1">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title mb-4">Update Category</h1>
                    <form id="my-form" action="/updateCategory" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $transactionCategory->id }}">

                        <div class="form-group mb-4">
                            <label for="categoryName"><i class="fas fa-Category"></i> Category name</label>
                            <input type="text" class="form-control" id="wallet" value="{{ $transactionCategory->name }}"
                                name="categoryName">
                            <span style="color:red">@error('categoryName'){{$message}}@enderror</span>
                        </div>

                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button type="submit" class="btn btn-primary">Save Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
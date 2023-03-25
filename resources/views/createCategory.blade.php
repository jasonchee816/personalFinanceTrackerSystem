@extends('layouts.default')

@section('content')



<div class="container1">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title mb-4">Create New Category</h1>
                    <form id="my-form" action="createCategory/form" method="POST">
                        @csrf
                        <div class="form-group mb-4">
                            <label for="categoryName"><i class="fas fa-Category"></i> Category name</label>
                            <input type="text" class="form-control" id="wallet" placeholder="Name" name="categoryName" value="{{old('categoryName')}}">
                            <span style="color:red">@error('categoryName'){{$message}}@enderror</span>
                        </div>
                        <div class="form-group mb-4">
                            <label id="categoryType" ><i class="fa-solid fa-list"></i> Category type</label>
                            <select class="form-select" id="categoryType" name="categoryType">
                                @if (old('categoryType') == '')
                                <option disabled value="" selected="selected">Choose your category type</option>
                                @else
                                <option disabled value="">Choose your Category type</option>
                                @endif
                                @if (old('categoryType') == 'Expense')
                                <option value='expense' selected>Expense</option>
                                @else
                                <option value='expense' >Expense</option>
                                @endif
                                @if (old('categoryType') == 'Income')
                                <option value='income' selected>Income</option>
                                @else
                                <option value='income' >Income</option>
                                @endif
                            </select>
                            <span style="color:red">@error('categoryType'){{$message}}@enderror</span>
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

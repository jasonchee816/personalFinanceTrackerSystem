@extends('layouts.default')

@section('content')

<div class=container1>
    <h1>Register</h1>
    <form action="register" method="POST">
        @csrf

        <div class="nameInput mb-4">
            <label id="name"><i class=""></i>Name</label>
            <input type="name" class="form-control" id="name" placeholder="Name" name="name">
            <span style="color:red">@error('name'){{$message}}@enderror</span>
        </div>

        <div class="EmailInput mb-4">
            <label for="email"><i class="fas fa-email"></i> Email </label>
            <input type="text" class="form-control" id="email" placeholder="Email" name="email">
            <span style="color:red">@error('email'){{$message}}@enderror</span>
        </div>

        <div class="passwordInput mb-4">
            <label id="password"><i class="fa-solid key"></i>Password</label>
            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
            <span style="color:red">@error('password'){{$message}}@enderror</span>
        </div>

        <div class="telNoInput mb-4">
            <label id="telNo"><i class="fa-solid key"></i>Telephone Number</label>
            <input type="number" class="form-control" id="tel_no" placeholder="Telephone Number" name="tel_no">
            <span style="color:red">@error('tel_no'){{$message}}@enderror</span>
        </div>

        <div class="d-grid gap-2 col-3 mx-auto">
            <button type="submit" class="btn btn-primary">Register</button>
            <a href="#">Already has a account? Login Now!</a>
        </div>

    </form>

</div>
@stop
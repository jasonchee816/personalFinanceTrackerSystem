@extends('layouts.default')

@section('content')

<div class = container1>
    <h1>Log In</h1>
    <form action="login" method="POST">
    @csrf


    <div class="EmailInput mb-4">
        <label for="email"><i class="fas fa-email"></i> Email </label>
        <input type="text" class="form-control" id="email" placeholder="Email" name="email">
        <span style="color:red">@error('email'){{$message}}@enderror</span>
    </div>

    <div class="passwordInput mb-4">
        <label id="password" ><i class="fa-solid key"></i>Password</label>
        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
        <span style="color:red">@error('password'){{$message}}@enderror</span>
    </div>

    <div class = "d-grid gap-2 col-3 mx-auto">
        <button type="submit" class="btn btn-primary">Login</button>
    </div>

    </form>

</div>
@stop



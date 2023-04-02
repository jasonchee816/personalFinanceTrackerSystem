@extends('layouts.default')

@section('content')

<div class="container1 container-fluid">
    <div class=" text-center text-lg-start">
        <div class="card mb-3 mt-3">
            <div class="row g-0 d-flex align-items-center">
                <div class="col-lg-6 d-lg-flex">
                    <img src="/image/adminlogin.png" alt="Admin Login image" class="w-100" />
                </div>
                <div class="col-lg-6">
                    <div class="card-body py-5 px-md-5">
                        <h1 class="mb-5">Admin Login </h1>

                        <form action="/admin/login" method="POST">
                            @csrf 
                            <!-- Email input -->
                            <div class="form-floating mb-4">
                                <input type="email" id="email" name="email" placeholder="Email"
                                    class="form-control input-lg" />
                                <label class="form-label" for="email">Email address</label>
                                <span style="color:red">@error('email'){{$message}}@enderror</span>
                            </div>

                            <!-- Password input -->
                            <div class="form-floating mb-4">
                                <input type="password" id="password" name="password" placeholder="Password"
                                    class="form-control input-lg" />
                                <label class="form-label" for="password">Password</label>
                                <span style="color:red">@error('password'){{$message}}@enderror</span>
                            </div>

                            <div class="mx-auto col-5 mb-5 text-center">
                                New User? <a href="/admin/register">Register </a>Now!
                            </div>


                            <div class="d-grid gap-2 col-3 mx-auto">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>

</div>
@stop
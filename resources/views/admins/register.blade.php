@extends('layouts.default')

@section('content')

<div class=container1>
    <form action="register" method="POST">
        @csrf
        <div class=" text-center text-lg-start">
            <style>
                .rounded-t-5 {
                    border-top-left-radius: 0.5rem;
                    border-top-right-radius: 0.5rem;
                }

                @media (min-width: 992px) {
                    .rounded-tr-lg-0 {
                        border-top-right-radius: 0;
                    }

                    .rounded-bl-lg-5 {
                        border-bottom-left-radius: 0.5rem;
                    }
                }
            </style>
            <div class="card mb-3 mt-3">
                <div class="row g-0 d-flex align-items-center">
                    <div class="col-lg-6 d-none d-lg-flex">
                        <img src="https://www.shutterstock.com/image-photo/finance-trade-manager-analysing-stock-260nw-1556915846.jpg"
                            alt="Trendy Pants and Shoes" class="w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" />
                    </div>
                    <div class="col-lg-6">
                        <div class="card-body py-5 px-md-5">
                            <h1 class="mb-5">Register </h1>
                            <form>
                                <!-- Name input -->
                                <div class="form-floating mb-4">
                                    <input type="name" id="name" name="name" placeholder="Name"
                                        class="form-control input-lg" />
                                    <label class="form-label" for="name">Name</label>
                                    <span style="color:red">@error('name'){{$message}}@enderror</span>
                                </div>

                                <!-- Email input -->
                                <div class="form-floating mb-4">
                                    <input type="email" id="email" name="email" placeholder="Email"
                                        class="form-control input-lg" />
                                    <label class="form-label" for="email">Email address</label>
                                    <span style="color:red">@error('email'){{$message}}@enderror</span>
                                </div>

                                <!-- telNo input -->
                                <div class="form-floating mb-4">
                                    <input type="number" id="tel_no" name="tel_no" placeholder="Telephon No"
                                        class="form-control input-lg" />
                                    <label class="form-label" for="tel_no">Telephone Number</label>
                                    <span style="color:red">@error('tel_no'){{$message}}@enderror</span>
                                </div>

                                <!-- Password input -->
                                <div class="form-floating mb-4">
                                    <input type="password" id="password" name="password" placeholder="Password"
                                        class="form-control input-lg" />
                                    <label class="form-label" for="password">Password</label>
                                    <span style="color:red">@error('password'){{$message}}@enderror</span>
                                </div>

                                <!-- Password Confirmation input -->
                                <div class="form-floating mb-4">
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        placeholder="Confirm Password" class="form-control input-lg" />
                                    <label class="form-label" for="password_confirmation">Confirm Password</label>
                                </div>

                                <div class="mx-auto col-5 mb-5">
                                    <div class=" ">
                                        <a href="/login" class="h5">Already has a account? Login Now!</a>
                                    </div>
                                </div>

                                <div class="d-grid gap-2 col-3 mx-auto">
                                    <button type="submit" class="btn btn-primary">Register</button>
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
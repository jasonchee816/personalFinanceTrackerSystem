@extends('layouts.default')
@section('content')

<body>
    <!-- <nav class="navbar bg-primary">
        <div class="logoBtn col-lg-4 ps-5">
            <a class="btn ps-5" href="#"><b>LMEO </b></a>
        </div>
        <div class="d-sm-flex d-none col-lg-8 justify-content-between pe-md-5">
            <a class="btn" href="#">Homepage</a>
            <a class="btn" href="#">About Us</a>
            <a class="btn" href="#">Contact Us</a>
            <a class="btn" href="#">FAQ</a>
            <a class="btn pe-lg-5 me-lg-5" href="#"><b>Login </b></a>
        </div>
        <div class="d-sm-none d-flex col-lg-8 flex-column">
            <a class="btn" data-bs-toggle="offcanvas" href="#navbarOffcanvas" id="navBar">
                <i class="fa-solid fa-bars"></i>
            </a>
        </div>
    </nav> -->
    {{--Offcanvas for Mobile Nav Bar--}}
    <div class="offcanvas offcanvas-end px-2" tabindex="-1" id="navbarOffcanvas">
        <div class="offcanvas-header mt-3" id="selectOffcanvasHeader">
            <button type="button" class="btn-close mb-1 float-end" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-flex flex-column align-items-start justify-content-evenly"
            id="selectOffcanvasBody">
            <a class="btn" href="#">Homepage</a>
            <a class="btn" href="#">About Us</a>
            <a class="btn" href="#">Contact Us</a>
            <a class="btn" href="#">FAQ</a>
            <a class="btn" href="#">Login</a>
        </div>
    </div>

    <div class="container-fluid position-relative" style="overflow-x: hidden;">
        <div class="row flex-nowrap">
            <div class="row mt-5 mx-auto">
                <div class="col-10 mx-auto">
                    <h1>Frequently Asked Questions</h1>
                    <p>03-02-2023</p>

                    <div class="mb-4">
                        <p class="question">What is LMEO Finance Tracking System?</p>
                        <p class="answer">LMEO Finance Tracking System is LMEO's latest System which allows users to
                            track the balance in their different accounts, keep track of their expenses and incomes as
                            well as gain insights of their spending habits. </p>
                    </div>

                    <div class="mb-4">
                        <p class="question">Who is LMEO?</p>
                        <p class="answer"> We are a Software Company hoping to help people in personal finance. You can
                            learn more about us in <a href="about">here.</a></p>
                    </div>

                    <div class="mb-4">
                        <p class="question">How do I contact LMEO?</p>
                        <p class="answer">You may contact us via any of the methods list in <a href="contact">here.</a>
                        </p>
                    </div>

                    <div class="mb-4">
                        <p class="question">Is my data safe with LMEO?</p>
                        <p class="answer">Your data is safe with us. </a></p>
                    </div>

                </div>
            </div>
        </div>

    </div>
    @stop
@extends('layouts.default')

@section('content')
<div class="container0">
    <h1>LMEO COMPANY</h1>
    <h3>Personal Finance Tracker</h3>
</div>

<!-- Container (About Section) -->
<div id="about" class="container1">
    <!-- <div class="row"> -->
    <div class="mb-4">
        <h2>About LMEO Company </h2><br>
        <h4>Unique and Powerful website to track your expenses along with incomes. </h4><br>
        <p>Software is our craft and our passion. At LMEO, we create beautiful software to solve business problems. We
            believe that software is the ultimate product of the mind and the hands. But as much as we love building
            beautiful software, we think our people and company culture are our most important assets. Our engineers
            spend
            years mastering their craft, bringing together decades of engineering expertise to produce a real work of
            art.
            When you choose Zoho, you get more than just a single product or a tightly integrated suite. You get our
            commitment to continuous refinement and to improving your experience. And you get our relentless devotion to
            your satisfaction. </p>
    </div>
</div>

<div id="services" class="container2 text-center">
    <h2>SERVICES</h2>
    <h4>What LMEO offers</h4>
    <br>
    <div class="row slideanim">
        <div class="col-sm-4">
            <i class="service-icon fas fa-solid fa-credit-card"></i>
            <h4>FINANCIAL PLAN</h4>
            <p>Wisely planned financial.</p>
        </div>
        <div class="col-sm-4">
            <i class="service-icon fas fa-wallet"></i>
            <h4>WALLET</h4>
            <p>Multiple wallets to be tracked.</p>
        </div>
        <div class="col-sm-4">
            <i class="service-icon fas fa-sharp fa-regular fa-globe"></i>
            <h4>24/7 TRACKING</h4>
            <p>Track your expenses anytime & anywhere.</p>
        </div>

    </div>
    <br><br>
</div>

<!-- Container (FAQ Section) -->
<div id="faq" class="container1">
    <h2>Frequently Asked Questions</h2>
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

<!-- Container (Contact Section) -->
<div id="contact" class="container2">
    <h2>CONTACT</h2>
    <div class="row">
        <div class="col-sm-5">
            <p>Contact us and we'll get back to you within 24 hours.</p>
            <p><span class="icon fas fa-solid fa-map-location-dot"></span> Selangor, Malaysia</p>
            <p><span class="icon fas fa-phone"></span> +60 12 345 6789</p>
            <p><span class="icon fas fa-envelope"></span> financetracker@lmeo.com</p>
        </div>
    </div>
</div>

<script src="{{asset('js/homepage.js')}}"></script>
@stop
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap 5 -->
    <!-- <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('css/Style.css')}}">

    <!--FontAwesome 6-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>LMEO - FAQ</title>

    <style>
        a {
            color: #332D2D;
        }

        .navbar div .btn {
            color: #f8f9fa;
        }

        body {
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            /* Hide scrollbar for IE, Edge and Firefox */
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }

        /* Hide scrollbar for Chrome, Safari and Opera */
        body::-webkit-scrollbar {
            display: none;
        }



        .offcanvas {
            border-radius: 1rem 0 0 1rem;
        }

        .offcanvas-backdrop {
            display: none !important;
        }

        .question {
            color: rgba(0, 58, 84, 1);
            font-size: 27px;
        }

        .answer a {
            color: #332D2D;
        }
    </style>


</head>

<body>
    <nav class="navbar bg-primary">
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
    </nav>
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


    <!-- Bootstrap JS -->
    <!-- <script type="text/javascript" src="{{asset('js/bootstrap.bundle.min.js')}}"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>


    <script>


    </script>
</body>

</html>
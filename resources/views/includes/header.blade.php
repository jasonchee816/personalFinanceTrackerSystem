<style>
    body {
        font: 400 15px Lato, sans-serif;
        line-height: 1.8;
        color: #818181;
    }

    .navbar {
        margin-bottom: 0;
        background-color: #406E8E;
        z-index: 9999;
        border: 0;
        font-size: 12px !important;
        line-height: 1.42857143 !important;
        letter-spacing: 4px;
        border-radius: 0;
        font-family: Montserrat, sans-serif;
    }

    .navbar li a,
    .navbar .navbar-brand {
        color: #fff !important;
        height: 60px;
        padding-top: 1.2rem;
    }

    .navbar-brand {
        padding-top: 1rem !important;
    }

    .navbar-nav li a:hover,
    .navbar-nav li.active a {
        color: #406E8E !important;
        background-color: #fff !important;
    }

    .navbar-default .navbar-toggle {
        border-color: transparent;
        color: #fff !important;
    }

    .icon {
        font-size: 10px;
        color: #406E8E;
    }

    .question {
        color: rgba(0, 58, 84, 1);
        font-size: 27px;
    }

    .answer a {
        color: #332D2D;
    }

    .service-icon {
        font-size: 50px;
        margin-bottom: 20px;
        color: #406E8E;
    }

    @media screen and (max-width: 768px) {
        .col-sm-4 {
            text-align: center;
            margin: 25px 0;
        }

        .btn-lg {
            width: 100%;
            margin-bottom: 35px;
        }
    }

    @media screen and (max-width: 480px) {
        .logo {
            font-size: 150px;
        }
    }
</style>
<nav class="navbar navbar-expand-md navbar-dark fixed-top p-0" aria-label="Third navbar example">
    <div class="container-fluid">
        <a class="navbar-brand ms-5 ps-5 py-0" href="#myPage">LMEO</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03"
            aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse navbar-right me-xxl-5  pe-xxl-5" id="navbarsExample03">
            <ul class="navbar-nav ms-auto mb-2 mb-sm-0">
                <li class="nav-item">
                    <a class="nav-link px-3 ps-5" href="#myPage">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3" href="#about">ABOUT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3" href="#services">FAQ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3" href="#contact">CONTACT</a>
                </li>
                <li class="nav-item ps-3 pe-5 me-5">
                    <a class="nav-link" href="#">LOGIN</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#myPage">LMEO</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right ">
                <li><a href="#home">HOME</a></li>
                <li><a href="#about">ABOUT</a></li>
                <li><a href="#services">FAQ</a></li>
                <li><a href="#contact">CONTACT</a></li>
                <li><a href="#">LOGIN</a></li>
            </ul>
        </div>
    </div>
</nav> -->
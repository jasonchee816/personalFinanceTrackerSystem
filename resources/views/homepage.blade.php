<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com -->
  <title>Bootstrap Theme Company Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" 
  integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" 
  crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    body {
      font: 400 15px Lato, sans-serif;
      line-height: 1.8;
      color: #818181;
    }

    h2 {
      font-size: 26px;
      text-transform: uppercase;
      color: #303030;
      font-weight: 650;
      margin-bottom: 20px;
      text-align: center;    
    }

    h4 {
      font-size: 22px;
      line-height: 1.375em;
      color: #303030;
      font-weight: 450;
      margin-bottom: 20px;
    }

    .container0 {
      background-color: #406E8E;
      color: #fff;
      padding: 80px 25px;
      font-family: Montserrat, sans-serif;
      text-align: center;
    }
    .container0 h1{
        font-size: 50px;
    }
    .container1 {
        padding: 60px 50px;
    }
    .container2 {
        padding: 60px 50px;
        background-color: #f6f6f6;
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

    .navbar li a, .navbar .navbar-brand {
      color: #fff !important;
    }

    .navbar-nav li a:hover, .navbar-nav li.active a {
      color: #406E8E !important;
      background-color: #fff !important;
    }

    .navbar-default .navbar-toggle {
      border-color: transparent;
      color: #fff !important;
    }

    .icon {
      font-size: 15px;
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
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

  <nav class="navbar navbar-default navbar-fixed-top">
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
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#home">HOME</a></li>
          <li><a href="#about">ABOUT</a></li>
          <li><a href="#services">FAQ</a></li>
          <li><a href="#contact">CONTACT</a></li>
          <li><a href="#">LOGIN</a></li>
        </ul>
      </div>
    </div>
  </nav>

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
        <p>Software is our craft and our passion. At LMEO, we create beautiful software to solve business problems. We believe that software is the ultimate product of the mind and the hands. 				But as much as we love building beautiful software, we think our people and company culture are our most important assets. Our engineers spend years mastering their craft, bringing together decades of engineering expertise to produce a real work of art. When you choose Zoho, you get more than just a single product or a tightly integrated suite. You get our commitment to continuous refinement and to improving your experience. And you get our relentless devotion to your satisfaction. </p>
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

  <script>
    $(document).ready(function () {
      // Add smooth scrolling to all links in navbar + footer link
      $(".navbar a, footer a[href='#myPage']").on('click', function (event) {
        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
          // Prevent default anchor click behavior
          event.preventDefault();

          // Store hash
          var hash = this.hash;

          // Using jQuery's animate() method to add smooth page scroll
          // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
          $('html, body').animate({
            scrollTop: $(hash).offset().top
          }, 900, function () {

            // Add hash (#) to URL when done scrolling (default click behavior)
            window.location.hash = hash;
          });
        } // End if
      });

      $(window).scroll(function () {
        $(".slideanim").each(function () {
          var pos = $(this).offset().top;

          var winTop = $(window).scrollTop();
          if (pos < winTop + 600) {
            $(this).addClass("slide");
          }
        });
      });
    })
  </script>

</body>
</html>
<nav class="navbar navbar-expand-md navbar-dark fixed-top p-0" aria-label="Third navbar example">
    <div class="container-fluid">
        <a class="navbar-brand ms-3 ms-md-5 ps-5 py-0" href="/#home">LMEO</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03"
            aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        @guest
        <div class="collapse navbar-collapse navbar-right me-xxl-5  pe-xxl-5" id="navbarsExample03">
            <ul class="navbar-nav ms-auto mb-2 mb-sm-0">
                <li class="nav-item">
                    <a class="nav-link px-3 ps-5 ps-md-3 ms-5 ms-md-0" href="/#home">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 ps-5 ps-md-3 ms-5 ms-md-0" href="/#about">ABOUT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 ps-5 ps-md-3 ms-5 ms-md-0" href="/#faq">FAQ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 ps-5 ps-md-3 ms-5 ms-md-0" href="/#contact">CONTACT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 ps-5 ps-md-3 ms-5 ms-md-0" href="/login">LOGIN</a>
                </li>
                <li class="nav-item pe-5 me-5">
                    <a class="nav-link ps-5 ps-md-3 ms-5 ms-md-0" href="/register">REGISTER</a>
                </li>
            </ul>
        </div>
        @endguest

        @auth
        <div class="collapse navbar-collapse navbar-right me-xxl-5  pe-xxl-5" id="navbarsExample03">
            <ul class="navbar-nav ms-auto mb-2 mb-sm-0">
                <li class="nav-item">
                    <a class="nav-link px-3 ps-5 ps-md-3 ms-5 ms-md-0" href="/#home">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 ps-5 ps-md-3 ms-5 ms-md-0" href="/wallets">WALLETS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 ps-5 ps-md-3 ms-5 ms-md-0" href="/transaction">TRANSACTIONS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 ps-5 ps-md-3 ms-5 ms-md-0" href="/profile">PROFILE</a>
                </li>
                <li class="nav-item pe-5 me-5">
                    <a class="nav-link ps-5 ps-md-3 ms-5 ms-md-0" href="" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">LOGOUT</a>
                </li>
                <form id="logout-form" action="logout" method="GET" style="display: none;">
                    @csrf
                </form>

            </ul>
        </div>
        @endauth

    </div>
</nav>
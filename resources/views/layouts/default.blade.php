<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes/head')

</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
    @include('includes/header')

    <div class="mt-5 vh-100">
        @yield('content')
    </div>

</body>
</html>
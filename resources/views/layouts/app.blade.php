<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="nighandday">
    <meta name="keywords" content="nighandday">
    <meta name="author" content="YesAgency">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ URL::to('/') }}/images/favicon/5.png" type="image/x-icon">
    <link rel="shortcut icon" href="{{ URL::to('/') }}/images/favicon/5.png" type="image/x-icon">
    <title>Night & Day by 4Brands Official - Website</title>

    <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">

    <!-- Styles -->
    <!--Fontawesome-->
    <link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet" type="text/css">

    <!--Slick slider css-->
    <link href="{{ asset('css/slick.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/slick-theme.css') }}" rel="stylesheet" type="text/css">

    <!-- Animate icon -->
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet" type="text/css">

    <!-- Themify icon -->
    <link href="{{ asset('css/themify-icons.css') }}" rel="stylesheet" type="text/css">

    <!-- Bootstrap css -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css">

    <!-- Theme css -->
    <link href="{{ asset('css/color5.css') }}" rel="stylesheet" type="text/css" media="screen" id="color">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    @stack('head')
</head>

<body>


<!-- header start -->
<header class="header-2">
    <div class="mobile-fix-option"></div>
    @include('partials.header')

    @include('partials.header-logo')

    @include('partials.nav')
</header>
<!-- header end -->

    <main>
        @yield('content')
    </main>


@include('partials.footer')

<!-- tap to top start -->
<div class="tap-top">
    <div><i class="fa fa-angle-double-up"></i></div>
</div>
<!-- tap to top end -->

<!-- Scripts -->
<!-- popper js-->
<script src="{{ asset('js/popper.min.js') }}" defer></script>
<!-- slick js-->
<script src="{{ asset('js/slick.js') }}" defer></script>
<!-- menu js-->
<script src="{{ asset('js/menu.js') }}" defer></script>
<!-- lazyload js-->
<script src="{{ asset('js/lazysizes.min.js') }}" defer></script>
<!-- Bootstrap js-->
<script src="{{ asset('js/bootstrap.js') }}" defer></script>
<!-- Bootstrap Notification js-->
<script src="{{ asset('js/bootstrap-notify.min.js') }}" defer></script>
<!-- laroute js -->
<script src="{{ asset('js/laroute.js') }}"></script>
<script src="{{ asset('js/bootstrap-input-spinner.js') }}" defer></script>
<!-- Other custom scripts -->
@stack('custom-scripts')
<!-- Theme js-->
<script src="{{ asset('js/script.js') }}" defer></script>

</body>
</html>

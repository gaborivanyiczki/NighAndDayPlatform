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
    <title>Admin Panel - Night & Day by 4Brands Official - Website</title>

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Styles -->
    <!--Fontawesome-->
    <link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet" type="text/css">

    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/flag-icon.css') }}">

    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/icofont.css') }}">

    <!-- Prism css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/prism.css') }}">

    <!-- Chartist css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/chartist.css') }}">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">

    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}">

    <!-- JQUERY-->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    @stack('head')
</head>

<body>

<!-- Main Wrapper -->
<div class="page-wrapper">

    @include('dashboard.partials.header')

    <!-- Page Body Start-->
    <div class="page-body-wrapper">

        @include('dashboard.partials.nav')

        <div class="page-body">
            <main>
                @yield('content')
            </main>
        </div>
        @include('dashboard.partials.footer')

    </div>
</div>

<!-- Scripts -->
<!-- popper js-->
<script src="{{ asset('js/popper.min.js') }}"></script>
<!-- Bootstrap js-->
<script src="{{ asset('js/bootstrap.js') }}"></script>
<!-- feather icon js-->
<script src="{{ asset('js/icons/feather-icon/feather.min.js') }}"></script>
<script src="{{ asset('js/icons/feather-icon/feather-icon.js') }}"></script>
<!-- Sidebar jquery-->
<script src="{{ asset('js/sidebar-menu.js') }}"></script>

<!--chartist js-->
<script src="{{ asset('js/chart/chartist/chartist.js') }}"></script>

<!--chartjs js-->
<script src="{{ asset('js/chart/chartjs/chart.min.js') }}"></script>

<!-- lazyload js-->
<script src="{{ asset('js/lazysizes.min.js') }}"></script>

<!--copycode js-->
<script src="{{ asset('js/prism/prism.min.js') }}"></script>
<script src="{{ asset('js/clipboard/clipboard.min.js') }}"></script>
<script src="{{ asset('js/custom-card/custom-card.js') }}"></script>

<!--counter js-->
<script src="{{ asset('js/counter/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('js/counter/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('js/counter/counter-custom.js') }}"></script>

<!--peity chart js-->
<script src="{{ asset('js/chart/peity-chart/peity.jquery.js') }}"></script>

<!--sparkline chart js-->
<script src="{{ asset('js/chart/sparkline/sparkline.js') }}"></script>

<!--dashboard custom js-->
<script src="{{ asset('js/dashboard/default.js') }}"></script>

<!--right sidebar js-->
<script src="{{ asset('js/chat-menu.js') }}"></script>

<!--height equal js-->
<script src="{{ asset('js/height-equal.js') }}"></script>

<!--script admin-->
<script src="{{ asset('js/admin-script.js') }}"></script>
</body>
</html>

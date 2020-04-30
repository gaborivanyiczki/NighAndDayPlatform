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

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">

    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}">

    @stack('styles')

    <!-- JQUERY-->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
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
<script src="{{ asset('js/laroute.js') }}"></script>
<!-- lazyload js-->
<script src="{{ asset('js/lazysizes.min.js') }}"></script>
<!--right sidebar js-->
<script src="{{ asset('js/chat-menu.js') }}"></script>
<!--script admin-->
<script src="{{ asset('js/admin-script.js') }}"></script>
@stack('scripts')

</body>
</html>

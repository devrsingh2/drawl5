<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Favicons -->
{{--    <link href="{{ asset('public/assets/master/img/favicon.png') }}" rel="icon">--}}
    <link href="{{ asset('assets/master/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i" rel="stylesheet">
    <!-- Bootstrap css -->
    <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
    <link href="{{ asset('assets/master/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="{{ asset('assets/master/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/master/lib/owlcarousel/assets/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/master/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/master/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/master/lib/modal-video/css/modal-video.min.css') }}" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="{{ asset('assets/master/css/style.css') }}" rel="stylesheet">

    @yield('header')
</head>

<body id="body">
@include('tenant.includes.messages')
<!-- #header -->
@include('master.includes.header')
<!-- #header -->

<!--==========================
  Hero Section
============================-->
@include('master.includes.banner')
<!-- #hero -->

@yield('content')

<!--==========================
  Footer
============================-->
@include('master.includes.footer')

<!-- JavaScript Libraries -->
<script src="{{ asset('assets/master/lib/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/master/lib/jquery/jquery-migrate.min.js') }}"></script>
<script src="{{ asset('assets/master/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/master/lib/superfish/hoverIntent.js') }}"></script>
<script src="{{ asset('assets/master/lib/superfish/superfish.min.js') }}"></script>
<script src="{{ asset('assets/master/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('assets/master/lib/modal-video/js/modal-video.js') }}"></script>
<script src="{{ asset('assets/master/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/master/lib/wow/wow.min.js') }}"></script>
<!-- Contact Form JavaScript File -->
<script src="{{ asset('assets/master/contactform/contactform.js') }}"></script>
<!-- Template Main Javascript File -->
<script src="{{ asset('assets/master/js/main.js') }}"></script>
@yield('footer')
</body>
</html>
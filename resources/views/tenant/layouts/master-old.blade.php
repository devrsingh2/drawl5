<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name', 'Reverse Auction') }} - @yield('title')</title>

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/materialdesignicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/material.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/ripples.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.carousel.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/slicknav.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/responsive.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/color-switcher.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/colors/indigo.css') }}" media="screen" />

    <link href="{{ asset('assets/css/customers/main.css') }}" rel="stylesheet">
    {{--added by shriyash--}}
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="{{ asset('assets/css/customers/notification.css') }}" rel="stylesheet" />

    @yield('header')
</head>
<body>

@include('tenant.includes.header')
@auth
    @include('tenant.includes.sidebar')
@endauth
@yield('banner')

@yield('content')

@include('tenant.includes.footer')

<script src="{{ asset('assets/frontend/js/jquery-min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/color-switcher.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.mixitup.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.inview.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/scroll-top.js') }}"></script>
<script src="{{ asset('assets/frontend/js/smoothscroll.js') }}"></script>
<script src="{{ asset('assets/frontend/js/material.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/ripples.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/form-validator.min.js') }}"></script>
{{--<script src="{{ asset('assets/frontend/js/contact-form-script.min.js') }}"></script>--}}
<script src="{{ asset('assets/frontend/js/wow.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.vide.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.slicknav.js') }}"></script>
<script src="{{ asset('assets/frontend/js/main.js') }}"></script>
<script src="{{asset('js/customer.js')}}"></script>
<script src="{{asset('js/toastr.min.js')}}"></script>

@include('tenant.includes.messages')
@yield('footer')
</body>
</html>

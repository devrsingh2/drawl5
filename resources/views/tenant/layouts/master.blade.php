<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title -->
    <title>{{ config('app.name', 'DrawerApp') }} - @yield('title')</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/tenant/frontend/img/core-img/favicon.png') }}">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/tenant/frontend/css/main.css') }}">
    @yield('header')
</head>
<body>
<!-- Preloader -->
<div id="preloader">
    <div class="loader"></div>
</div>
<!-- /Preloader -->
<!-- Header Area Start -->
@include('tenant.includes.header')
<!-- Header Area End -->
@yield('banner')

@yield('content')

<!-- Footer Area Start -->
@include('tenant.includes.footer')
<!-- Footer Area End -->
<!-- **** All JS Files ***** -->
<!-- jQuery 2.2.4 -->
<script src="{{ asset('assets/tenant/frontend/js/jquery.min.js') }}"></script>
<!-- Popper -->
<script src="{{ asset('assets/tenant/frontend/js/popper.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('assets/tenant/frontend/js/bootstrap.min.js') }}"></script>
<!-- All Plugins -->
<script src="{{ asset('assets/tenant/frontend/js/qtcls.bundle.js') }}"></script>
<!-- Active -->
<script src="{{ asset('assets/tenant/frontend/js/default-assets/active.js') }}"></script>
@include('tenant.includes.messages')
@yield('footer')
</body>
</html>
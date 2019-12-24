<header class="header-area">
    <!-- Top Header Area Start -->
    <div class="top-header-area">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="top-header-content">
                        <a href="#"><i class="fa fa-phone" aria-hidden="true"></i> <span>Call Us: 123-456-7890</span></a>
                        <a href="#"><i class="fa fa-envelope" aria-hidden="true"></i> <span>Email: info@drawerapp.com</span></a>
                    </div>
                </div>

                <div class="col-6">
                    <div class="top-header-content">
                        <!-- Login -->
                        <a href="{{ route('login') }}"><i class="fa fa-lock" aria-hidden="true"></i> <span>Login / Register</span></a>
                        <!-- Language -->
                        {{--<div class="dropdown">
                            <a class="btn pr-0 dropdown-toggle" href="#" role="button" id="langdropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ asset('assets/tenant/frontend/img/core-img/eng.png') }}" alt=""> English</a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="langdropdown">
                                <a class="dropdown-item" href="#">- Latvian</a>
                                <a class="dropdown-item" href="#">- Hindi</a>
                                <a class="dropdown-item" href="#">- Bangla</a>
                            </div>
                        </div>--}}
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Top Header Area End -->

    <!-- Main Header Start -->
    <div class="main-header-area">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Classy Menu -->
                <nav class="classy-navbar justify-content-between" id="qtclsNav">

                    <!-- Logo -->
                    <a class="nav-brand" href="{{ route('home') }}">
                        <span style="color: #fff;">{{ config('app.name', 'DrawerApp') }}</span>
                        {{--<img src="{{ asset('assets/tenant/frontend/img/core-img/logo.png') }}" alt="">--}}
                    </a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">
                        <!-- Menu Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>
                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul id="nav">
                                <li class="active"><a href="{{ route('home') }}">Home</a></li>
                                <li><a href="{{ route('cms', 'about') }}">About</a></li>
                                <li><a href="#">Products</a>
                                    <ul class="dropdown">
                                        <li><a href="#">Print Manager</a></li>
                                        <li><a href="#">Machine Scope</a></li>
                                        <li><a href="#">CNC Machine</a></li>
                                        <li><a href="#">Torque Wrench</a></li>
                                        <li><a href="#">QC Data Collector</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Services</a>
                                    <ul class="dropdown">
                                        <li><a href="#">CNC</a></li>
                                        <li><a href="#">CAM</a></li>
                                        <li><a href="#">Customised Process Solutions</a></li>
                                        <li><a href="#">International Marketing</a></li>
                                        <li><a href="#">Part Manufacturing</a></li>
                                        <li><a href="#">Prototyping</a></li>
                                        <li><a href="#">Web Applications</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('contact-us') }}">Contact Us</a></li>
                            </ul>

                            <!-- Live Chat -->
                            {{--<div class="live-chat-btn ml-5 mt-4 mt-lg-0 ml-md-4">
                                <a href="#" class="btn qtcls-btn live--chat--btn"><i class="fa fa-comments" aria-hidden="true"></i> Live Chat</a>
                            </div>--}}
                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
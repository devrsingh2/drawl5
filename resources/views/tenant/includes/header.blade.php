<header id="header">
    <nav class="navbar navbar-expand-lg fixed-top scrolling-navbar nav-bg">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="mdi mdi-menu"></span>
                    <span class="mdi mdi-menu"></span>
                    <span class="mdi mdi-menu"></span>
                </button>
                <a class="navbar-brand" href="{{ config('app.url') }}">
                    {{ config('app.name', 'Reverse Auction') }}
                </a>
            </div>
            <div class="collapse navbar-collapse" id="main-navbar">
                <ul class="navbar-nav mr-auto w-100 justify-content-end">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ config('app.url') }}" >
                            Home
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{ config('app.url') }}#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Pages
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ url('pages/about-us') }}">About Us</a>
                            <a class="dropdown-item" href="{{ url('pages/term-and-condition') }}">Terms & Conditions</a>
                            <a class="dropdown-item" href="{{ url('pages/privacy-policy') }}">Privacy Policy</a>
                            <a class="dropdown-item" href="{{ route('get-faq') }}">Faq</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('get-blog') }}" >
                            Blog
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact-us') }}">
                            Contact Us
                        </a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ auth()->user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('customer.dashboard') }}" >
                                        Dashboard
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @include('tenant.includes.notification')

                            @endguest
                </ul>

                {{--<div class="search-icon">
<span class="open-search">
<i class="mdi mdi-magnify btn btn-common"></i>
</span>
                </div>
                <form role="search" class="navbar-form">
                    <div class="container">
                        <div class="row">
                            <div class="form-group has-feedback">
                                <input type="text" placeholder="Type and search ..." class="form-control">
                                <div class="close"><i class="mdi mdi-close"></i></div>
                            </div>
                        </div>
                    </div>
                </form>--}}

            </div>
        </div>

        <ul class="wpb-mobile-menu">
            <li>
                <a class="active" href="{{ config('app.url') }}">
                    Home
                </a>
            </li>
            <li>
                <a href="{{ config('app.url') }}#">
                    Pages
                </a>
                <ul class="dropdown">
                    <li>
                        <a href="{{url('pages/about-us')}}">About Us</a>
                    </li>
                    <li>
                        <a href="{{url('pages/term-and-condition')}}">Terms & Conditions</a>
                    </li>
                    <li>
                        <a href="{{url('pages/privacy-policy')}}">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="{{ route('get-faq') }}">Faq</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('get-blog') }}">
                    Blog
                </a>
            </li>
            <li>
                <a href="#">
                    Contact Us
                </a>
            </li>
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ auth()->user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @include('tenant.includes.notification')

                    @endguest


        </ul>

    </nav>
</header>
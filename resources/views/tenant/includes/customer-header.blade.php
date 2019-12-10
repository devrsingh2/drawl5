
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Reverse Auction</title>
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Reverse - Auction</title>

        <!-- Font Awesome Icons -->
        <link href="{{asset('public/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

        <!-- Plugin CSS -->
        <link href="{{asset('public/vendor/magnific-popup/magnific-popup.css')}}" rel="stylesheet">


        <!-- Theme CSS - Includes Bootstrap -->
        <link href="{{asset('public/css/creative.min.css')}}" rel="stylesheet">


    </head>
    <style>
        .wrapper {
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            margin:0;
            position:relative;
            background-color:#212121;
            background-image:url('https://res.cloudinary.com/dsp6kqag8/image/upload/c_scale,w_1000/v1504850153/beach7_qnrvds.jpg');
            background-repeat:no-repeat;
            background-size:cover;
            background-position:50% 50%;
            overflow: hidden;
        }

        .overlay {
            width:100%;
            height:100%;
            background-color:rgba(106, 169, 242, .7);
            display:flex;
            justify-content:center;
            align-items:center;
            flex-direction:column;
        }

        .overlay h1 {
            font-size:5rem;
            color:#f0f0ee;
            font-family:"Courier", sans-serif;
            width:auto;
            height:90px;
            margin:45vh 0 0 0;
            font-weight:300;
        }

        .overlay h1 span {
            font-weight:900;
            margin-right:5px;
            width:auto;
            height:100%;
            background:rgba(16, 21, 49, .75);
            padding:5px 10px;
        }

        .overlay p {
            color:#f0f0ee;
            font-size:.9rem;
            font-weight:900;
            font-family:"Verdana", sans-serif;
            margin-top:15px;
        }

        .menu_btn {
            width:40px;
            height:40px;
            position:absolute;
            top:10px;
            left:10px;
            cursor:pointer;
            background-color:transparent;
            background-image:url('https://res.cloudinary.com/dsp6kqag8/image/upload/v1469753516/Menu_gk3ed1.svg');
            background-position:center;
            background-size:40px 40px;
            background-repeat:no-repeat;
            z-index:999999;
        }

        .menu_panel {
            width:33.33%;
            height:100vh;
            position:absolute;
            z-index:1;
            background:rgba(16, 21, 49, .95);
        }

        .menu_1 {
            top:-100vh;
            left:0;
        }

        .menu_2 {
            bottom:-100vh;
            left:33.33%;
        }

        .menu_3 {
            top:-100vh;
            left:66.66%;
        }

        .drop_down {
            animation:drop_down .25s forwards;
        }

        .drop_up {
            animation:drop_up .25s forwards;
        }

        .reverse_drop_down {
            animation:reverse_drop_down .25s both;
        }

        .reverse_drop_up {
            animation:reverse_drop_up .25s both;
        }

        @keyframes drop_down {
            0% {
                top:-100vh;
            }

            100% {
                top:0;
            }
        }

        @keyframes reverse_drop_down {
            0% {
                top:0;
            }

            100% {
                top:-100vh;
            }
        }

        @keyframes drop_up {
            0% {
                bottom:-100vh;
            }

            100% {
                bottom:0;
            }
        }

        @keyframes reverse_drop_up {
            0% {
                bottom:0;
            }

            100% {
                bottom:-100vh;
            }
        }

        .menu_info {
            width:100vw;
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            background:transparent;
            position:absolute;
            bottom:-100vh;
            left:0;
            z-index:9999;
        }

        .menu_info ul {
            width:100%;
            height:100%;
            margin:0;
            padding:0;
            display:flex;
            justify-content:center;
            align-items:center;
            flex-direction:column;
        }

        .menu_info ul li {
            width:50%;
            height:80px;
            display:flex;
            color:#f0f0ee;
            display:flex;
            justify-content:center;
            align-items:center;
            font-size:1.75em;
            font-family:"Garamound", sans-serif;
            cursor:pointer;
            transition:all .25s ease-in-out;
        }

        .menu_info ul li:hover {
            color:#6AA9F2;
        }

        .menu_btn p {
            display:flex;
            justify-content:center;
            align-items:center;
            color:#f0f0ee;
            font-size:3rem;
            font-weight:900;
            width:100%;
            height:100%;
            margin:0;
            padding:0;
            transition:all .25s ease-in-out;
        }

        .menu_btn p:hover {
            color:red;
        }

        @media only screen and (max-width : 540px) {
            .overlay h1 {
                font-size:4rem;
            }
        }

        @media only screen and (max-width : 420px) {
            .overlay h1 {
                font-size:3rem;
                height:65px;
            }

            .overlay p {
                font-size:.75rem;
                margin-top:0;
            }
        }
        .hide{
            display:none !important;
        }
        .background-video{
            position: absolute;
            z-index: 0;
            opacity: 0.4;
            width:100%;
        }
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 300px;
            margin: auto;
            text-align: center;
        }

        .title {
            color: grey;
            font-size: 18px;
        }

        button {
            border: none;
            outline: 0;
            display: inline-block;
            padding: 8px;
            color: white;
            background-color: #000;
            text-align: center;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
        }

        a {
            text-decoration: none;
            font-size: 22px;
            color: black;
        }

        button:hover, a:hover {
            opacity: 0.7;
        }
    </style>
<body>

<input type="hidden" id="customer_url" value="{{ url('/customer') }}">
<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Reverse Auction</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto my-2 my-lg-0">
                @if(Auth::check())

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ Auth::user()->name }} <span class="caret"></span>
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
                        <div></div>
                    </li>
                @else

                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{{route('login')}}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{{route('register')}}">Register</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<!-- Masthead -->
<header class="wrapper masthead">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-10 align-self-end">
                <h1 class="text-uppercase text-white font-weight-bold">
                    @if(Auth::check() && Auth::user()->role==4)
                        Welcome {{Auth::user()->name}}
                    @else
                        Reverse Auction Specialists & Procurement Consultants
                    @endif
                </h1>
                <hr class="divider my-4">
            </div>
            <div class="col-lg-8 align-self-baseline">
                @if(Auth::check() && Auth::user()->role==4)
                @else
                    <p class="text-white-75 font-weight-light mb-5">Reducing procurement prices and turnaround time is the topmost priority of businesses in the current competitive environment. And, this has certainly increased the demand for online reverse auction platforms, serving you the best Salasar e-auction house offers real-time bidding solutions. We are the leading reverse live-auctioning service providers and have been helping buyers to make the best out of their purchases. So don't wait ahead, just register yourself with us right away!</p>
                @endif
            </div>
        </div>
    </div>

</header>
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
    <!-- <link href="{{asset('public/css/main.css')}}" rel="stylesheet"> -->
        <link href="{{ asset('public/assets/css/customers/notification.css') }}" rel="stylesheet" />
        <link href="{{asset('public/css/toastr.min.css')}}" rel="stylesheet">
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
            z-index: 1029;
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

        .product-class {
            padding: 25px;
            width: 100%;
            /*padding-top: 27px;*/
        }
        a {
            cursor: pointer;
        }
        
        
        
        .btn-dark {
            -moz-animation-duration: 600ms;
            -moz-animation-name: blink;
            -moz-animation-iteration-count: infinite;
            -moz-animation-direction: alternate;

            -webkit-animation-duration: 600ms;
            -webkit-animation-name: blink;
            -webkit-animation-iteration-count: infinite;
            -webkit-animation-direction: alternate;

            animation-duration: 600ms;
            animation-name: blink;
            animation-iteration-count: infinite;
            animation-direction: alternate;
          }

          @-moz-keyframes blink {
            from {
              opacity: 1;
            }

            to {
              opacity: 0.5;
            }
          }

          @-webkit-keyframes blink {
            from {
              opacity: 1;
            }

            to {
              opacity: 0.5;
            }
          }

          @keyframes blink {
            from {
              opacity: 1;
            }

            to {
              opacity: 0.5;
            }
          }
          
          
        .set-size {
          font-size: 10em;
        }

        .charts-container{
            display: flex;
            align-items: center;
        }
        .charts-container:after {
            clear: both;
            content: '';
            display: table;
            
        }

        .pie-wrapper {
          height: 1em;
          width: 1em;
          float: left;
          margin: 15px;
          position: relative;
        }
        .pie-wrapper:nth-child(3n + 1) {
          clear: both;
        }
        .pie-wrapper .pie {
          height: 100%;
          width: 100%;
          clip: rect(0, 1em, 1em, 0.5em);
          left: 0;
          position: absolute;
          top: 0;
        }
        .pie-wrapper .pie .half-circle {
          height: 100%;
          width: 100%;
          border: 0.1em solid #3498db;
          border-radius: 50%;
          clip: rect(0, 0.5em, 1em, 0);
          left: 0;
          position: absolute;
          top: 0;
        }
        .pie-wrapper .label {
          background: #34495e;
          border-radius: 50%;
          bottom: 0.4em;
          color: #ecf0f1;
          cursor: default;
          display: block;
          font-size: 0.25em;
          left: 0.4em;
          line-height: 2.8em;
          position: absolute;
          right: 0.4em;
          text-align: center;
          top: 0.4em;
        }
        .pie-wrapper .label .smaller {
          color: #bdc3c7;
          font-size: .45em;
          padding-bottom: 20px;
          vertical-align: super;
        }
        .pie-wrapper .shadow {
          height: 100%;
          width: 100%;
          border: 0.1em solid #bdc3c7;
          border-radius: 50%;
        }
        .pie-wrapper .label {
          background: none;
          color: #7f8c8d;
        }
        .pie-wrapper.style-2 .label .smaller {
          color: #bdc3c7;
        }
        .pie-wrapper.progress-dial.style-1 .pie .half-circle {
          border-color: #ff00d2;
        }
        .pie-wrapper.progress-dial.style-2 .pie .half-circle {
          border-color: #03f789;
        }
        .pie-wrapper.progress-dial.style-3 .pie .half-circle {
          border-color: #0099ff;
        }
        .pie-wrapper.progress-dial .pie .left-side {
          transform: rotate(162deg);
        }
        .pie-wrapper.progress-dial .pie .right-side {
          display: none;
        }
        .chart-label{
            font-size: 19px;
            position: absolute;
            width: 100%;
            left: 0px;
            text-align: center;
            color: #bdc3c6;
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
                    @if(Auth::user()->role==4)
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="{{ route('place-requirement') }}">Post Requirement</a>
                        </li>
                    @endif
                    <li class="nav-item dropdown" >
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a style="font-size: inherit;" class="dropdown-item" data-toggle="modal" data-target="#profile-model">Profile</a>
                            <a style="font-size: inherit;" class="dropdown-item" data-toggle="modal" data-target="#change-password">Update Password</a>
                            <a style="font-size: inherit;" class="dropdown-item"  data-toggle="modal" data-target="#existing-requirement">Requirements</a>
                            <a style="font-size: inherit;" class="dropdown-item" href="{{ route('logout') }}"
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
                @include('tenant.includes.notification')
            </ul>
            
        </div>
    </div>
</nav>
<div id="btn" class="menu_btn"></div>
<!-- Masthead -->
<header class="wrapper masthead">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-10 align-self-end">
                @if(Auth::check() && Auth::user()->role==4)
                <h1 class="text-uppercase text-white font-weight-bold">
                        Welcome {{Auth::user()->name}}
                </h1>
                <hr class="divider my-4">
                <div class="set-size charts-container justify-content-center">
                    <div class="pie-wrapper progress-dial style-1" data-percentage='100'>
                        <span class="label" ><span id="progress_req"></span><span class="smaller">%</span></span>
                        <div class="pie">
                            <div class="left-side half-circle"></div>
                            <div class="right-side half-circle"></div>
                        </div>
                        <div class="shadow"></div>
                        <label class='chart-label'>Requirements</label>
                    </div>
                    <div class="pie-wrapper progress-dial style-2" data-percentage='100'>
                        <span class="label"><span id="progress_bid"></span><span class="smaller">%</span></span>
                        <div class="pie">
                            <div class="left-side half-circle"></div>
                            <div class="right-side half-circle"></div>
                        </div>
                        <div class="shadow"></div>
                        <label class='chart-label'>Bid's</label>
                    </div>
                    <div class="pie-wrapper progress-dial style-3" data-percentage='100'>
                        <span class="label">0<span class="smaller">%</span></span>
                        <div class="pie">
                            <div class="left-side half-circle"></div>
                            <div class="right-side half-circle"></div>
                        </div>
                        <div class="shadow"></div>
                        <label class='chart-label'>Order Placed</label>
                    </div>
                    
                </div>
                @else
                <h1 class="text-uppercase text-white font-weight-bold">
                    Reverse Auction Specialists & Procurement Consultants
                </h1>
                <hr class="divider my-4">
                @endif
            </div>
            <div class="col-lg-8 align-self-baseline">
                @if(Auth::check() && Auth::user()->role==4)
                @else
                    <p class="text-white-75 font-weight-light mb-5">Reducing procurement prices and turnaround time is the topmost priority of businesses in the current competitive environment. And, this has certainly increased the demand for online reverse auction platforms, serving you the best Salasar e-auction house offers real-time bidding solutions. We are the leading reverse live-auctioning service providers and have been helping buyers to make the best out of their purchases. So don't wait ahead, just register yourself with us right away!</p>
                    <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Find Out More</a>
                @endif
            </div>
        </div>
    </div>
    
    <div class="menu_panel hide menu_1"></div>
    <div class="menu_panel hide menu_2"></div>
    <div class="menu_panel hide menu_3"></div>
    <div class="menu_info hide">
        <img src="{{ asset('/public/img/animated-bg.gif') }}" class="background-video">
        </img>
        <ul style="z-index: 1">
            <li  data-toggle="modal" data-target="#profile-model">PROFILE</li>
            <li  data-toggle="modal" onclick="return placeNewRequirement()">REQUIREMENTS</li>
            {{--<li>PURCHASES</li>
            <li>PAYMENT HISTORY</li>--}}
        </ul>
    </div>
</header>

<!-- About Section -->
{{--<section class=" " id="about">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 ">
             <form class="modal-content" action="{{ url('/customer/post-requirement') }}"  style="box-shadow: 10px 10px 18px 0px #000;"  id="place-requirement-without-popup" method="post">

             @csrf
                <div class="container">
                    <h2 class="text-center mt-0">Post Requirement</h2>
                  <hr>
                   <div class="form-group">
                        <label for="inputName">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter requirement title"/>
                    </div>
                    <div class="form-group">
                        <label for="inputMessage">Description</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Enter description of requirement"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Category</label>
                        <select class="custom-select" id="category" name="category">
                            @if(Auth::check() && Auth::user()->role==4)
                            @isset($categories)
                                @foreach($categories as $category)
                                    <option value='{{$category->id}}'>{{$category->name}}</option>
                                @endforeach
                            @endif    
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Quantity</label>
                        <input type="number" class="form-control" min="1" value="1" name="quantity" id="quantity" placeholder="Enter quantity"/>
                    </div>
                </div>
                <input type="hidden" name="product_id" value="1">
              <div class="clearfix">
            <button type="submit" class="signupbtn">Save</button>
          </div>
        </div>
      </form>
                 <h2 class="text-white mt-0">We've got what you need!</h2>
                <hr class="divider light my-4">
                <p class="text-white-50 mb-4">
                    Pan-india reach<br>
                    Verified customer database<br>
                    Customised services<br>
                    Secured payment gateway<br>
                    Online and offline customer support</p>
                <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">Get Started!</a>
            </div>
        </div>
    </div>
</section>--}}
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<!-- Services Section -->
<section class="page-section" id="services">
    <div class="container">
        <h2 class="text-center mt-0">@if(count($requirements) > 0) Existing Requirement @else Post Requirement @endif</h2>
        <hr class="divider my-4">
        @if(count($requirements) > 0)
        <div class="row">
            <div class="container">
                
                <table class="existing-requirement table table-striped">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Posted On</th>
                        <th>Bids</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                        @foreach($requirements as $k => $item)
                            <tr>
                                <td>{{ $item->title }}</td>
                                <td>{!! $item->description !!}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->bids->count() }}</td>
                                <td>
                                    <a href="{{ route('customer.list-bids', $item->id) }}" class="btn btn-sm btn-success">Bids</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="float: right">
                {{$requirements->render() }}
               </div>
            </div>

        </div>
        @else
        <div class="container text-center">
            <a class="btn btn-dark btn-xl" style='color:white' href="{{ route('place-requirement') }}" >Post you'r first requirement here...</a>
        </div>
        @endif

    </div>
</section>
<script>

</script>
<!-- Product Section -->
<section id="portfolio">
    <div class="container-fluid p-0">
        <div class="row no-gutters">

            @if(($products))
                @foreach($products as $product)
                    <div class="col-lg-4 col-sm-6">
                        {{--<a class="portfolio-box" title="{{$product->name}}" style="width: 435px; height: 235px; background: url(public/img/pattern-bg.jpeg);" href="{{asset('public/img/product').'/'.$product->productAdditional->attachment}}" data-source="{{ route('post-requirement', $product->id) }}" >--}}
                        <a class="portfolio-box" title="{{$product->name}}" style="width: 435px; height: 235px; background: url(public/img/pattern-bg.jpeg);" href="{{asset('public/img/product').'/'.$product->productAdditional->attachment}}" data-source="{{ $product->id }}" >
                            <img class="img-fluid" style="max-width: 435px; max-height: 235px; display: block; width: auto; height: auto; margin: 0 auto;" src="{{asset('public/img/product').'/'.$product->productAdditional->attachment}}" alt="">
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">
                                   Product Category:
                                {{($product->productCategories->name)}}
                                </div>
                                <div class="project-name">
                                    Product Name: {{$product->name}}
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            @endif
        </div>
    </div>

</section>
<!-- Call to Action Section -->
@if(Auth::check())
<section class="page-section bg-dark text-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="mt-0">Contact us!</h2>
                <hr class="divider my-4">
                <p class="text-nowrap mb-4">Got a question?  We'd love to hear from you. Send us message and we'll respond as soon as possible.</p>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('contact-us') }}" method="post">
            @csrf
            <div class="form-group ml-auto mb-4">
                <div class="col-lg-12 ml-auto">
                    <input type="text" name="name" placeholder="Your Name" class="form-control">
                </div>
            </div>
            <div class="form-group ml-auto mb-4">
                <div class="col-lg-12 ml-auto">
                    <input type="text" name="email" placeholder="Your Email Address" class="form-control">
                </div>
            </div>

            <div class="form-group ml-auto mb-4">
                <div class="col-lg-12 ml-auto">
                    <input type="text" name="subject" placeholder="Subject" class="form-control">
                </div>
            </div>
            <div class="form-group ml-auto mb-4">
                <div class="col-lg-12 ml-auto">
                    <textarea name="message" placeholder="Leave a Message" class="form-control"></textarea>
                </div>
            </div>
            <div class="form-group ml-auto mb-4">
                <div class="col-lg-12 ml-auto">
                    <button type="submit"> SEND MESSAGE</button>
                </div>
            </div>
        </form>
    </div>
</section>
@else
<section class="page-section bg-dark text-white">
    <div class="container text-center">
        <h2 class="mb-4">Free Registeration!</h2>
        <a class="btn btn-light btn-xl" href="{{route('register')}}">Register Now!</a>
    </div>
</section>
@endif
<!-- Contact Section -->
<section class="page-section" id="contact">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="mt-0">Let's Get In Touch!</h2>
                <hr class="divider my-4">
                <p class="text-muted mb-5">Ready to publish your next requirements with us? Give us a call or send us an email and we will get back to you as soon as possible!</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 ml-auto text-center">
                <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                <div>{{ \App\Setting::find(4)->value }}</div>
            </div>
            <div class="col-lg-4 mr-auto text-center">
                <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
                <!-- Make sure to change the email address in anchor text AND the link below! -->
                <a class="d-block" href="mailto:{{ \App\Setting::find(3)->value }}">{{ \App\Setting::find(3)->value }}</a>
            </div>
        </div>
    </div>
</section>
<input type="hidden" id="bannerDataRoute" value="{{route('customer.banner-data')}}">
<!-- Button to trigger modal -->
<!-- Footer -->
{{--<footer class="bg-light py-5">
    <div class="container">
        <div class="small text-center text-muted">Copyright &copy; {{ date('Y') }} - {{ \App\Setting::find(1)->value }}</div>
    </div>
</footer>--}}
@include('tenant.includes.footer')

{{--@include('includes.models.place-requirement')--}}
@include('tenant.includes.models.popup_files')

<script src="{{asset('public/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('public/js/customer.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script src="{{asset('public/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Plugin JavaScript -->
<script src="{{asset('public/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('public/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
<!-- Custom scripts for this template -->
<script src="{{asset('public/js/creative.min.js')}}"></script>
<script src="{{asset('public/js/toastr.min.js')}}"></script>
@yield('footer')
<script>
    main();
    $('#portfolio').magnificPopup({
        delegate: 'a',
        type: 'image',
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-img-mobile',
        showCloseBtn: true,
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0, 1]
        },
        image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
            titleSrc: function(item) {
                var requirement_id = item.el.attr('data-source');
//                return item.el.attr('title') + ' &middot; <button class="btn btn-sm btn-primary image-source-link" href="'+item.el.attr('data-source')+'" target="_blank">Place This Requirement</button>';
                return '<div class="product-class">' +
                    '<button class="btn btn-sm btn-primary image-source-link" onclick="return fnToOpenPlaceRequirement('+requirement_id+');" >Place This Requirement</button>' +
                    '</div>';
            }
        }
    });
    function fnToOpenPlaceRequirement(id) {
        window.location.href='{{ url('/') }}/customer/place-requirement/'+id;
    }

</script>
</body>
</html>

                           
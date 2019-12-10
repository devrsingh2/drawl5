
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
        <script src="{{asset('public/vendor/jquery/jquery.min.js')}}"></script>
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
                    @if(Auth::user()->role==4)
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" data-toggle="modal" data-target="#place-requirement-model">Post Requirement</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" data-toggle="modal" data-target="#existing-requirement">Existing Requirement</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" data-toggle="modal" data-target="#profile-model">Profile</a>
                        </li>

                    @endif
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
                        <a class="nav-link js-scroll-trigger" href="#about-us">About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#contact-us">Contact</a>
                    </li>
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


{{--<header style="background-image: url({{url('public/assets/images/c1.jpg')}}">--}}
<div>
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
                    <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Find Out More</a>
                @endif
            </div>
        </div>
    </div>
    </div>
</header>

<!-- About Section -->
<section class="page-section bg-primary" id="about">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
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
</section>

<!-- Services Section -->
<section class="page-section" id="services">
    <div class="container">
        <h2 class="text-center mt-0">At Your Service</h2>
        <hr class="divider my-4">
        <div class="row">
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <i class="fas fa-4x fa-gem text-primary mb-4"></i>
                    <h3 class="h4 mb-2">Best Bidders</h3>
                    <p class="text-muted mb-0">Our vendors always ready bid on the requirements!</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <i class="fas fa-4x fa-laptop-code text-primary mb-4"></i>
                    <h3 class="h4 mb-2">Up to Date</h3>
                    <p class="text-muted mb-0">All dependencies are kept current to keep things fresh.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <i class="fas fa-4x fa-globe text-primary mb-4"></i>
                    <h3 class="h4 mb-2">Ready to Publish</h3>
                    <p class="text-muted mb-0">You can publish your requirements, and vendors are bid to the requirements!</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <i class="fas fa-4x fa-heart text-primary mb-4"></i>
                    <h3 class="h4 mb-2">Made with Love</h3>
                    <p class="text-muted mb-0">Is it really simple and flexible if its not made with love?</p>
                </div>
            </div>
        </div>
    </div>
</section>

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
                                    Category
                                <!-- {{($product->productCategories->name)}} -->
                                </div>
                                <div class="project-name">
                                    {{$product->name}}
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
<section class="page-section bg-dark text-white" id="about-us">
    <div class="container text-center">
        <h2 class="mb-4">About Us</h2>
        <p class="text-white-75 font-weight-light mb-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
    </div>
</section>

<!-- Contact Section -->
<section class="page-section" id="contact-us">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="mt-0">Let's Get In Touch!</h2>
                <hr class="divider my-4">
                <p class="text-muted mb-5">Ready to publish your next requirements with us? Give us a call or send us an email and we will get back to you as soon as possible!</p>
            </div>
        </div>
        @include('tenant.includes.messages')
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
            <div class="form-group ml-auto">
                <div class="col-lg-12 ml-auto">
                    <input type="text" name="name" placeholder="Your Name" class="form-control">
                </div>
            </div>
            <div class="form-group ml-auto">
                <div class="col-lg-12 ml-auto">
                    <input type="text" name="email" placeholder="Your Email Address" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-12 ml-auto">
                    <input type="text" name="subject" placeholder="Subject" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-12 ml-auto">
                    <textarea name="message" placeholder="Leave a Message" class="form-control"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-12 ml-auto">
                    <button type="submit"> SEND MESSAGE</button>
                </div>
            </div>
        </form>
    </div>
</section>
<section class="page-section" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 ml-auto text-center">
                <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                <div>+91 9923278659</div>
            </div>
            <div class="col-lg-4 mr-auto text-center">
                <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
                <!-- Make sure to change the email address in anchor text AND the link below! -->
                <a class="d-block" href="mailto:contact@yourwebsite.com">{{ \App\Setting::find(3)->value }}</a>
            </div>
        </div>
    </div>
</section>
<!-- Button to trigger modal -->
<!-- Footer -->
@include('tenant.includes.footer')

<!-- Modal -->
<div class="modal fade" id="place-requirement-model" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="place-requirement" action="{{ url('/customer/post-requirement') }}" method="post">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Post Requirement</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <p class="statusMsg"></p>
                    @csrf
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
                                @foreach($categories as $category)
                                    <option value='{{$category->id}}'>{{$category->name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Quantity</label>
                        <input type="number" class="form-control" min="1" value="1" name="quantity" id="quantity" placeholder="Enter quantity"/>
                    </div>
                </div>
                <input type="hidden" name="product_id" value="1">
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">SUBMIT</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="existing-requirement" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Exsting Requirements</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <div class="container">

                    <table class="existing-requirement table table-striped">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>

            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary submitBtn">SUBMIT</button>
            </div>
        </div>
    </div>
</div>
<!-- profile modal -->
<!-- Modal -->
<div class="modal fade" id="profile-model" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Body -->
            <div class="modal-body">
                <!------ Include the above in your HEAD tag ---------->

                <!-- Add icon library -->
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


                <img src="{{asset('/public/img/animated-bg.gif')}}" alt="John" style="width:100%">


                <h1>John Doe</h1>
                <p class="title">CEO & Founder, Example</p>
                <p>Harvard University</p>
                <a href="#"><i class="fa fa-dribbble"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
                <a href="#"><i class="fa fa-facebook"></i></a>
                <p><button>Contact</button></p>
            </div>
        </div>

    </div>
    <!-- Modal Footer -->
</div>

<script src="{{asset('public/js/customer.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script src="{{asset('public/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Plugin JavaScript -->
<script src="{{asset('public/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('public/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
<!-- Custom scripts for this template -->
<script src="{{asset('public/js/creative.min.js')}}"></script>
<script>
    function main() {
        const btn = document.getElementById('btn');
        btn.addEventListener('click', menuToggle);
    }

    function menuToggle() {
        const panels = document.getElementsByClassName('menu_panel');
        const menu = document.getElementsByClassName('menu_info')[0];
        const btn = document.getElementById('btn');

        if(panels[0].classList.contains('drop_down')) {
            //close
            $('.menu_info').addClass('hide');
            btn.innerHTML = '';
            btn.style.backgroundImage = 'url("https://res.cloudinary.com/dsp6kqag8/image/upload/v1469753516/Menu_gk3ed1.svg")';
            panels[0].style.animationDelay = '.5s';
            panels[0].classList.remove('drop_down');
            panels[0].classList.add('reverse_drop_down');
            panels[2].style.animationDelay = '.0s';
            panels[2].classList.remove('drop_down');
            panels[2].classList.add('reverse_drop_down');
            panels[1].style.animationDelay = '.25s';
            panels[1].classList.remove('drop_up');
            panels[1].classList.add('reverse_drop_up');
            menu.style.animationDelay = '.25s';
            menu.classList.remove('drop_up');
            menu.classList.add('reverse_drop_up');
            setTimeout(function(){
                $('.menu_panel').addClass('hide');
            },1000);
        } else if(panels[0].classList.contains('reverse_drop_down')) {
            //open
            $('.menu_panel').removeClass('hide');
            btn.style.backgroundImage = 'none';
            btn.innerHTML = '<p>&times;</p>';
            panels[0].style.animationDelay = '0s';
            panels[0].classList.remove('reverse_drop_down');
            panels[0].classList.add('drop_down');
            panels[2].style.animationDelay = '.5s';
            panels[2].classList.remove('reverse_drop_down');
            panels[2].classList.add('drop_down');
            panels[1].style.animationDelay = '.25s';
            panels[1].classList.remove('reverse_drop_up');
            panels[1].classList.add('drop_up');
            menu.style.animationDelay = '.75s';
            menu.classList.remove('reverse_drop_up');
            menu.classList.add('drop_up');
            setTimeout(function(){
                $('.menu_info').removeClass('hide');
            },800);
        } else {
            //initial
            panels[0].style.animationDelay = '0s';
            panels[0].classList.add('drop_down');
            panels[2].style.animationDelay = '.5s';
            panels[2].classList.add('drop_down');
            panels[1].style.animationDelay = '.25s';
            panels[1].classList.add('drop_up');
            btn.style.backgroundImage = 'none';
            btn.innerHTML = '<p>&times;</p>'
            menu.style.animationDelay = '.75s';
            menu.classList.add('drop_up');
            $('.menu_panel').removeClass('hide');
            setTimeout(function(){
                $('.menu_info').removeClass('hide');
            },800);
        }
    }
    main();

    $(document).ready(function() {


        var readURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.avatar').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }


        $(".file-upload").on('change', function(){
            readURL(this);
        });
    });

</script>
</body>
</html>


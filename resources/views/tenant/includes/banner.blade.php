@section('header')
    <style>
        .carousel {
            background:#007aeb;
        }

        /*
        Forces image to be 100% width and not max width of 100%
        */
        .carousel-item .img-fluid {
            width:100%;
        }

        /*
        anchors are inline so you need ot make them block to go full width
        */
        .carousel-item a {
            display: block;
            width:100%;
        }
    </style>
@endsection
<section class="welcome-area">
    <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="6000">
        <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
            <li data-target="#carousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <a href="https://bootstrapcreative.com/">
                    <!--
                    If you need more browser support use https://scottjehl.github.io/picturefill/
                    If a picture looks blurry on a retina device you can add a high resolution like this
                    <source srcset="img/blog-post-1000x600-2.jpg, blog-post-1000x600-2@2x.jpg 2x" media="(min-width: 768px)">

                    What image sizes should you use? This can help - https://codepen.io/JacobLett/pen/NjramL
                     -->
                    <picture>
                        <source srcset="https://dummyimage.com/2000x500/007aeb/4196e5" media="(min-width: 1400px)">
                        <source srcset="https://dummyimage.com/1400x500/#007aeb/4196e5" media="(min-width: 769px)">
                        <source srcset="https://dummyimage.com/800x500/007aeb/4196e5" media="(min-width: 577px)">
                        <img srcset="https://dummyimage.com/600x500/007aeb/4196e5" alt="responsive image" class="d-block img-fluid">
                    </picture>

                    <div class="carousel-caption">
                        <div>
                            <h2>Digital Craftsmanship</h2>
                            <p>We meticously build each site to get results</p>
                            <span class="btn btn-sm btn-outline-secondary">Learn More</span>
                        </div>
                    </div>
                </a>
            </div>
            <!-- /.carousel-item -->
            <div class="carousel-item">
                <a href="https://bootstrapcreative.com/">
                    <picture>
                        <source srcset="https://dummyimage.com/2000x500/007aeb/4196e5" media="(min-width: 1400px)">
                        <source srcset="https://dummyimage.com/1400x500/007aeb/4196e5" media="(min-width: 769px)">
                        <source srcset="https://dummyimage.com/800x500/007aeb/4196e5" media="(min-width: 577px)">
                        <img srcset="https://dummyimage.com/600x500/007aeb/4196e5" alt="responsive image" class="d-block img-fluid">
                    </picture>

                    <div class="carousel-caption justify-content-center align-items-center">
                        <div>
                            <h2>Every project begins with a sketch</h2>
                            <p>We work as an extension of your business to explore solutions</p>
                            <span class="btn btn-sm btn-outline-secondary">Our Process</span>
                        </div>
                    </div>
                </a>
            </div>
            <!-- /.carousel-item -->
            <div class="carousel-item">
                <a href="https://bootstrapcreative.com/">
                    <picture>
                        <source srcset="https://dummyimage.com/2000x500/007aeb/4196e5" media="(min-width: 1400px)">
                        <source srcset="https://dummyimage.com/1400x500/007aeb/4196e5" media="(min-width: 769px)">
                        <source srcset="https://dummyimage.com/800x500/007aeb/4196e5" media="(min-width: 577px)">
                        <img srcset="https://dummyimage.com/600x500/007aeb/4196e5" alt="responsive image" class="d-block img-fluid">
                    </picture>

                    <div class="carousel-caption justify-content-center align-items-center">
                        <div>
                            <h2>Performance Optimization</h2>
                            <p>We monitor and optimize your site's long-term performance</p>
                            <span class="btn btn-sm btn-secondary">Learn How</span>
                        </div>
                    </div>
                </a>
            </div>
            <!-- /.carousel-item -->
        </div>
        <!-- /.carousel-inner -->
        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- /.carousel -->
    {{--<div class="container-fluid text-center">
        <p>Full width carousel with a maximum height and art direction. Resize window to see image change based on the size of the window.</p>
    </div>--}}

    {{--<div class="welcome-pattern">
        <img src="{{ asset('assets/tenant/frontend/img/core-img/welcome-pattern.png') }}" alt="">
    </div>
    <div class="welcome-slides owl-carousel">
        <div class="single-welcome-slide">
            <div class="welcome-content h-100">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12 col-md-9 col-lg-7">
                            <div class="welcome-text mb-50">
                                <h2 data-animation="fadeInLeftBig" data-delay="200ms" data-duration="1s">The Best <br> Web Hosting</h2>
                                <h3 data-animation="fadeInLeftBig" data-delay="400ms" data-duration="1s">Starting at <span>$7.99</span> $2.95/month*</h3>
                                <p data-animation="fadeInLeftBig" data-delay="600ms" data-duration="1s">Everything you will EVER need to Host and Manage your Website!</p>
                                <a href="#" class="btn qtcls-btn btn-2" data-animation="fadeInLeftBig" data-delay="800ms" data-duration="1s">Get Start Now!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="welcome-thumbnail">
                <img src="{{ asset('assets/tenant/frontend/img/bg-img/1.png') }}" alt="">
            </div>
        </div>

        <div class="single-welcome-slide">
            <div class="welcome-content h-100">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12 col-md-9 col-lg-7">
                            <div class="welcome-text mb-50">
                                <h2 data-animation="fadeInUpBig" data-delay="200ms" data-duration="1s">The Best <br> Web Hosting</h2>
                                <h3 data-animation="fadeInUpBig" data-delay="400ms" data-duration="1s">Starting at <span>$7.99</span> $2.95/month*</h3>
                                <p data-animation="fadeInUpBig" data-delay="600ms" data-duration="1s">Everything you will EVER need to Host and Manage your Website!</p>
                                <a href="#" class="btn qtcls-btn btn-2" data-animation="fadeInUpBig" data-delay="800ms" data-duration="1s">Get Start Now!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="welcome-thumbnail">
                <img src="{{ asset('assets/tenant/frontend/img/bg-img/2.png') }}" alt="">
            </div>
        </div>

    </div>

    <div class="clouds">
        <img src="{{ asset('assets/tenant/frontend/img/core-img/cloud-1.png') }}" alt="" class="cloud-1">
        <img src="{{ asset('assets/tenant/frontend/img/core-img/cloud-2.png') }}" alt="" class="cloud-2">
        <img src="{{ asset('assets/tenant/frontend/img/core-img/cloud-3.png') }}" alt="" class="cloud-3">
        <img src="{{ asset('assets/tenant/frontend/img/core-img/cloud-4.png') }}" alt="" class="cloud-4">
        <img src="{{ asset('assets/tenant/frontend/img/core-img/cloud-5.png') }}" alt="" class="cloud-5">
    </div>--}}
</section>
@section('footer')
    <script>

    </script>
@endsection
<div id="main-slide" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#main-slide" data-slide-to="0" class="active"></li>
        <li data-target="#main-slide" data-slide-to="1"></li>
        <li data-target="#main-slide" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="{{ url('/') }}/public/assets/frontend/images/slider/slider-bg1.jpg" alt="First slide">
            <div class="carousel-caption d-md-block">
                <h1 class="animated wow fadeInDown hero-heading" data-wow-delay=".4s">REVERSE AUCTION SPECIALISTS</h1>
                <h5 class="animated fadeInUp wow hero-sub-heading" data-wow-delay=".6s">Getting started with your lowest unique bid.</h5>
                <a href="#products" class="animated fadeInUp wow btn btn-common" data-wow-delay=".8s"><i class="material-icons mdi mdi-lightbulb-outline"></i> Explore Now<div class="ripple-container"></div></a>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{ url('/') }}/public/assets/frontend/images/slider/slider-bg2.jpg" alt="Second slide">
            <div class="carousel-caption d-md-block">
                <h1 class="animated wow fadeInLeft hero-heading" data-wow-delay=".7s">PROCUREMENT CONSULTANTS</h1>
                <h5 class="animated wow fadeInRight hero-sub-heading" data-wow-delay=".9s">Service is easier than you think.</h5>
                <a href="{{ url('/pages/about-us') }}" class="animated fadeInUp wow btn btn-common" data-wow-delay=".8s"><i class="material-icons mdi mdi-lightbulb-outline"></i> Learn More <div class="ripple-container"></div></a>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{ url('/') }}/public/assets/frontend/images/slider/slider-bg3.jpg" alt="Third slide">
            <div class="carousel-caption d-md-block">
                <h1 class="animated wow fadeInDown hero-heading" data-wow-delay=".6s">Everyone has ideas...</h1>
                <h5 class="animated fadeInUp wow hero-sub-heading" data-wow-delay=".8s">And we know how to get them to market.</h5>
                <a href="#products" class="animated fadeInUp wow btn btn-common" data-wow-delay=".8s">Get Started <i class="material-icons mdi mdi-arrow-collapse-right"></i></a>
            </div>
        </div>
    </div>
    {{--<a class="carousel-control-prev" href="{{ config('app.url') }}#main-slide" role="button" data-slide="prev">
        <span class="carousel-control" aria-hidden="true"><i class="mdi mdi-arrow-left" data-ripple-color="#F0F0F0"></i></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="{{ config('app.url') }}#main-slide" role="button" data-slide="next">
        <span class="carousel-control" aria-hidden="true"><i class="mdi mdi-arrow-right" data-ripple-color="#F0F0F0"></i></span>
        <span class="sr-only">Next</span>
    </a>--}}
</div>
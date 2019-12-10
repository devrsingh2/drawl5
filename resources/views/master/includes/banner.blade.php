<style>
    .carousel-item {
        height: 70vh;
        min-height: 350px;
        background: no-repeat center center scroll;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        color: #fff;
    }
</style>
<header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <!-- Slide One - Set the background image for this slide in the line below -->
            <div class="carousel-item active" style="background-image: url('https://source.unsplash.com/LAaSoL0LrYs/1920x1080')">
                <div class="carousel-caption d-none d-md-block">
                    <h2 class="display-4">First Slide</h2>
                    <p class="lead">This is a description for the first slide.</p>
                </div>
            </div>
            <!-- Slide Two - Set the background image for this slide in the line below -->
            <div class="carousel-item" style="background-image: url('https://source.unsplash.com/bF2vsubyHcQ/1920x1080')">
                <div class="carousel-caption d-none d-md-block">
                    <h2 class="display-4">Second Slide</h2>
                    <p class="lead">This is a description for the second slide.</p>
                </div>
            </div>
            <!-- Slide Three - Set the background image for this slide in the line below -->
            <div class="carousel-item" style="background-image: url('https://source.unsplash.com/szFUQoyvrxM/1920x1080')">
                <div class="carousel-caption d-none d-md-block">
                    <h2 class="display-4">Third Slide</h2>
                    <p class="lead">This is a description for the third slide.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</header>
{{--
<section id="hero" class="wow fadeIn">
    <div class="hero-container">
        <h1>Welcome to eStartups</h1>
        <h2>Elegant Bootstrap Template for Startups, Apps &amp; more...</h2>
        <img src="img/hero-img.png" alt="Hero Imgs">
        <a href="#get-started" class="btn-get-started scrollto">Get Started</a>
        <div class="btns">
            <a href="#"><i class="fa fa-apple fa-3x"></i> App Store</a>
            <a href="#"><i class="fa fa-play fa-3x"></i> Google Play</a>
            <a href="#"><i class="fa fa-windows fa-3x"></i> windows</a>
        </div>
    </div>
</section>--}}
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
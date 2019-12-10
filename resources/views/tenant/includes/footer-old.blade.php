{{--
<footer class="bg-light py-5">
    <div class="container">
        <div class="small text-center text-muted">Copyright &copy; 2019 - Katalyst Technologies</div>
    </div>
</footer>--}}
<style>
    .footers {
        border-top: 1px solid #ccc;
        color: #F4623A;
        background: #343940;
    }
    .copyright {
        background: #343940;
    }
    .footers-li a{
        font-size: 12px;
    }
    .footers a {color:#fff;}
    .footers p {color:#fff;}
    .footers ul {line-height:30px;}
    #social-fb:hover {
        color: #3B5998;
        transition:all .001s;
    }
    #social-tw:hover {
        color: #4099FF;
        transition:all .001s;
    }
    #social-gp:hover {
        color: #d34836;
        transition:all .001s;
    }
    #social-em:hover {
        color: #f39c12;
        transition:all .001s;
    }
</style>
<section class="footers bg-grey pt-0 pb-1">
    <div class="container pt-5">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4 footers-one">
                <div class="footers-logo">
                    {{--<img src="http://velikorodnov.com/html/autotrader/images/logo.png" alt="Logo" style="width:120px;">--}}
                    {{ config('app.name') }}
                </div>
                <div class="footers-info mt-3">
                    <p>A powerful Reverse Auction Portal, that connect business and technology teams to align strategy with outcomes at enterprise scale.</p>
                </div>
                {{--<div class="social-icons">
                    <a href="https://www.facebook.com/"><i id="social-fb" class="fa fa-facebook-square fa-2x social"></i></a>
                    <a href="https://twitter.com/"><i id="social-tw" class="fa fa-twitter-square fa-2x social"></i></a>
                    <a href="https://plus.google.com/"><i id="social-gp" class="fa fa-google-plus-square fa-2x social"></i></a>
                    <a href="mailto:bootsnipp@gmail.com"><i id="social-em" class="fa fa-envelope-square fa-2x social"></i></a>
                </div>--}}
            </div>
            <div class="col-xs-12 col-sm-6 col-md-2 footers-li">
                <h5>Essentials </h5>
                <ul class="list-unstyled">
                    <li><a href="{{route('get-blog')}}">Blog</a></li>
                    <li><a href="{{route('get-faq')}}">FAQ</a></li>
                    <li><a href="{{url('pages/term-and-condition')}}">Term and Condition</a></li>
                    <li><a href="{{url('pages/privacy-policy')}}">Privacy Policy</a></li>

                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-2 footers-li">
                <h5>Information </h5>
                <ul class="list-unstyled">
                    <li><a href="maintenance.html">Register Now</a></li>
                    <li><a href="contact.html">Advice</a></li>
                    <li><a href="about.html">Videos</a></li>
                    <li><a href="about.html">Blog</a></li>
                    <li><a href="about.html">Services</a></li>
                </ul>
            </div>
            {{--<div class="col-xs-12 col-sm-6 col-md-2 footers-li">
                <h5>Explore </h5>
                <ul class="list-unstyled">
                    <li><a href="maintenance.html">News</a></li>
                    <li><a href="contact.html">Sitemap</a></li>
                    <li><a href="about.html">Testimonials</a></li>
                    <li><a href="about.html">Feedbacks</a></li>
                    <li><a href="about.html">User Agreement</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-2 footers-li">
                <h5>Company </h5>
                <ul class="list-unstyled">
                    <li><a href="maintenance.html">Career</a></li>
                    <li><a href="about.html">For Parters</a></li>
                    <li><a href="about.html">Terms</a></li>
                    <li><a href="about.html">Policy</a></li>
                    <li><a href="contact.html">Contact Us</a></li>
                </ul>
            </div>--}}
            <div class="col-xs-12 col-sm-12 col-md-4 footers-li">
                <h5>Contact Us </h5>
                <p>
                    <b>Phone:</b> {{ \App\Setting::find(4)->value }}
                </p>
                <p>
                    <b>Email:</b> {{ \App\Setting::find(3)->value }}
                </p>
                <p>
                    <b>Address:</b>
                    Unit #123,
                    5 Wattle Gr. YUNDERUP SOUTH WA 6208.
                </p>
            </div>

        </div>
    </div>
</section>
<section class="copyright border">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12 pt-3">
                <p class="text-muted">© {{ date('Y') }} {{ config('app.name') }} Pvt. Ltd.</p>
            </div>
        </div>
    </div>
</section>
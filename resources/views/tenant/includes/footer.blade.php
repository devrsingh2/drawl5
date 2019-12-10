
<footer class="page-footer center-on-small-only  pt-0 footer-widget-container">

    <div class="container pt-5 mb-5">
        <div class="row">

            <div class="col-md-6 col-lg-3 col-xl-3 footer-contact-widget">
                <h3 class="footer-title">About Us</h3>
                <p>A powerful Reverse Auction Portal, that connect business and technology teams to align strategy with outcomes at enterprise scale.</p>
                <ul>
                    <li>
                        <a href="{{ config('app.url') }}#"><i class="mdi mdi-facebook"></i></a>
                    </li>
                    <li>
                        <a href="{{ config('app.url') }}#"><i class="mdi mdi-twitter"></i></a>
                    </li>
                    <li>
                        <a href="{{ config('app.url') }}#"><i class="mdi mdi-dribbble"></i></a>
                    </li>
                    <li>
                        <a href="{{ config('app.url') }}#"><i class="mdi mdi-github-circle"></i></a>
                    </li>
                    <li>
                        <a href="{{ config('app.url') }}#"><i class="mdi mdi-linkedin"></i></a>
                    </li>
                </ul>
            </div>


            <div class="col-md-6 col-lg-3 col-xl-3 recent-widget">
                <h3 class="footer-title">Recent Products</h3>
                @php
                    $footer_products = \App\Product::take(5)
                    ->orderBy('id', 'desc')
                    ->get();
                @endphp
                <ul class="image-list">
                    @if((isset($footer_products)))
                        @foreach($footer_products as $product)
                            <li>
                                <figure class="overlay">
                                    @if(isset($product->productAdditional))
                                        <img class="img-fluid" src="{{asset('public/img/product').'/'.$product->productAdditional->attachment}}" alt="">
                                    @else
                                        <img class="img-fluid" src="{{ asset('public/assets/images/picture.png') }}" alt="">
                                    @endif
                                    <figcaption><a href="{{ route('place-requirement', [$product->id]) }}"><i class="mdi mdi-link-variant from-top icon-xs"></i></a></figcaption>
                                </figure>
                                <div class="post-content">
                                    <h6 class="post-title">
                                        <a href="{{ route('place-requirement', [$product->id]) }}">{{$product->name}}</a>
                                    </h6>
                                    <div class="meta">
                                        <span class="date">{{$product->created_at}}</span>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>


            <div class="col-md-6 col-lg-3 col-xl-3 link-widget">
                <h3 class="footer-title">Get in Touch</h3>
                {{--<p>Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Etiam porta sem malesuada magna mollis euismod. Praesent commodo cursus.</p>
                <div class="mt-3"></div>--}}
                <ul class="icon-list">
                    <li><i class="mdi mdi-map-marker"></i> Magarpatta City, Hadapsar, Pune, Maharashtra 411013 </li>
                    <li><i class="mdi mdi-email"></i> <a href="mailto:{{ \App\Setting::find(3)->value }}" class="nocolor">{{ \App\Setting::find(3)->value }}</a> </li>
                    <li><i class="mdi mdi-phone-classic"></i> {{ \App\Setting::find(4)->value }} </li>
                    {{--<li><i class="mdi mdi-cellphone-iphone"></i> +91 {{ \App\Setting::find(4)->value }} </li>--}}
                </ul>
            </div>


            <div class="col-md-6 col-lg-3 col-xl-3 footer-contact">
                <h3 class="footer-title">Subscribe</h3>
                <div class="widget">
                    <div class="newsletter-wrapper">
                        <form method="post" id="subscribe-form" name="subscribe-form" class="validate" action="{{route('customer.join-newsletter')}}">
                           @csrf
                            <div class="form-group">
                                <input type="email" value="" name="email" class="email form-control" id="email" placeholder="Email Address" required="">
                                <button type="button" name="subscribe" id="subscribe" class="btn btn-common pull-right">Join</button>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="widget">
                    <h5 class="widget-title">Useful Links</h5>
                    <ul class="unordered-list">
                        <li><a href="{{ config('app.url') }}#" class="nocolor">Terms of Use</a></li>
                        <li><a href="{{ config('app.url') }}#" class="nocolor">Privacy Policy</a></li>
                        <li><a href="{{ config('app.url') }}#" class="nocolor">Company Profile</a></li>
                        <li><a href="{{ config('app.url') }}#" class="nocolor">Why Choose Us</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>


    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>&copy; {{ date('Y') }} - {{ date('Y') + 1 }} {{ config('app.name') }}, All right reserved. Designed & Developed with <i class="mdi mdi-heart"></i> by <a href="http://{{ config('app.domain') }}" target="_blank">{{ config('app.name') }}</a></p>
                </div>
            </div>
        </div>
    </div>

</footer>

<a href="{{ config('app.url') }}#" class="back-to-top">
    <div class="ripple-container"></div>
    <i class="mdi mdi-arrow-up">
    </i>
</a>
{{--<div id="preloader">
    <div class="loader" id="loader-1"></div>
</div>--}}

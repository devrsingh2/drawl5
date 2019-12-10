@extends('master.layouts.default')

@section('title', 'Application Dashboard')

@section('content')
    <!--==========================
  Get Started Section
============================-->
    <section id="get-started" class="padd-section text-center wow fadeInUp">

        <div class="container">
            <div class="section-title text-center">

                <h2>simple systeme fordiscount </h2>
                <p class="separator">Integer cursus bibendum augue ac cursus .</p>

            </div>
        </div>

        <div class="container">
            <div class="row">

                <div class="col-md-6 col-lg-4">
                    <div class="feature-block">

                        <img src="{{ url('/') }}/public/assets/master/img/svg/cloud.svg" alt="img" class="img-fluid">
                        <h4>introducing whatsapp</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                        <a href="#">read more</a>

                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="feature-block">

                        <img src="{{ url('/') }}/public/assets/master/img/svg/planet.svg" alt="img" class="img-fluid">
                        <h4>user friendly interface</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                        <a href="#">read more</a>

                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="feature-block">

                        <img src="{{ url('/') }}/public/assets/master/img/svg/asteroid.svg" alt="img" class="img-fluid">
                        <h4>build the app everyone love</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                        <a href="#">read more</a>

                    </div>
                </div>

            </div>
        </div>

    </section>

    <!--==========================
      Services Section
    ============================-->

    <section id="services" class="padd-section text-center wow fadeInUp">

        <div class="container">
            <div class="section-title text-center">
                <h2>Amazing Services</h2>
                <p class="separator">Integer cursus bibendum augue ac cursus .</p>
            </div>
        </div>

        <div class="container">
            <div class="row">

                <div class="col-md-6 col-lg-3">
                    <div class="feature-block">
                        <img src="{{ url('/') }}/public/assets/master/img/svg/paint-palette.svg" alt="img" class="img-fluid">
                        <h4>creative design</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="feature-block">
                        <img src="{{ url('/') }}/public/assets/master/img/svg/vector.svg" alt="img" class="img-fluid">
                        <h4>Retina Ready</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="feature-block">
                        <img src="{{ url('/') }}/public/assets/master/img/svg/design-tool.svg" alt="img" class="img-fluid">
                        <h4>easy to use</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="feature-block">
                        <img src="{{ url('/') }}/public/assets/master/img/svg/asteroid.svg" alt="img" class="img-fluid">
                        <h4>Free Updates</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="feature-block">
                        <img src="{{ url('/') }}/public/assets/master/img/svg/asteroid.svg" alt="img" class="img-fluid">
                        <h4>Free Updates</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="feature-block">
                        <img src="{{ url('/') }}/public/assets/master/img/svg/cloud-computing.svg" alt="img" class="img-fluid">
                        <h4>App store support</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="feature-block">
                        <img src="{{ url('/') }}/public/assets/master/img/svg/pixel.svg" alt="img" class="img-fluid">
                        <h4>Perfect Pixel</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="feature-block">
                        <img src="{{ url('/') }}/public/assets/master/img/svg/code.svg" alt="img" class="img-fluid">
                        <h4>clean codes</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!--==========================
      About Us Section
    ============================-->
    <section id="about-us" class="about-us padd-section wow fadeInUp">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-md-5 col-lg-3">
                    <img src="{{ url('/') }}/public/assets/master/img/about-img.png" alt="About">
                </div>

                <div class="col-md-7 col-lg-5">
                    <div class="about-content">

                        <h2><span>eStartup</span>UI Design Mobile </h2>
                        <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat
                        </p>

                        <ul class="list-unstyled">
                            <li><i class="fa fa-angle-right"></i>Creative Design</li>
                            <li><i class="fa fa-angle-right"></i>Retina Ready</li>
                            <li><i class="fa fa-angle-right"></i>Easy to Use</li>
                            <li><i class="fa fa-angle-right"></i>Unlimited Features</li>
                            <li><i class="fa fa-angle-right"></i>Unlimited Features</li>
                        </ul>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <!--==========================
      Video Section
    ============================-->

    <section id="video" class="text-center wow fadeInUp">
        <div class="overlay">
            <div class="container-fluid container-full">

                <div class="row">
                    <a href="#" class="js-modal-btn play-btn" data-video-id="s22ViV7tBKE"></a>
                </div>

            </div>
        </div>
    </section>


    <!--==========================
      Pricing Table Section
    ============================-->
    {{--<section id="pricing" class="padd-section text-center wow fadeInUp">

        <div class="container">
            <div class="section-title text-center">

                <h2>Meet With Price</h2>
                <p class="separator">Integer cursus bibendum augue ac cursus .</p>

            </div>
        </div>

        <div class="container">
            <div class="row">

                <div class="col-md-6 col-lg-3">
                    <div class="block-pricing">
                        <div class="table">
                            <h4>basic</h4>
                            <h2>$29</h2>
                            <ul class="list-unstyled">
                                <li><b>4 GB</b> Ram</li>
                                <li><b>7/24</b> Tech Support</li>
                                <li><b>40 GB</b> SSD Cloud Storage</li>
                                <li>Monthly Backups</li>
                                <li>Palo Protection</li>
                            </ul>
                            <div class="table_btn">
                                <a href="#" class="btn"><i class="fa fa-shopping-cart"></i> Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="block-pricing">
                        <div class="table">
                            <h4>PERSONAL</h4>
                            <h2>$29</h2>
                            <ul class="list-unstyled">
                                <li><b>4 GB</b> Ram</li>
                                <li><b>7/24</b> Tech Support</li>
                                <li><b>40 GB</b> SSD Cloud Storage</li>
                                <li>Monthly Backups</li>
                                <li>Palo Protection</li>
                            </ul>
                            <div class="table_btn">
                                <a href="#" class="btn"><i class="fa fa-shopping-cart"></i> Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="block-pricing">
                        <div class="table">
                            <h4>BUSINESS</h4>
                            <h2>$29</h2>
                            <ul class="list-unstyled">
                                <li><b>4 GB</b> Ram</li>
                                <li><b>7/24</b> Tech Support</li>
                                <li><b>40 GB</b> SSD Cloud Storage</li>
                                <li>Monthly Backups</li>
                                <li>Palo Protection</li>
                            </ul>
                            <div class="table_btn">
                                <a href="#" class="btn"><i class="fa fa-shopping-cart"></i> Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="block-pricing">
                        <div class="table">
                            <h4>profeesional</h4>
                            <h2>$29</h2>
                            <ul class="list-unstyled">
                                <li><b>4 GB</b> Ram</li>
                                <li><b>7/24</b> Tech Support</li>
                                <li><b>40 GB</b> SSD Cloud Storage</li>
                                <li>Monthly Backups</li>
                                <li>Palo Protection</li>
                            </ul>
                            <div class="table_btn">
                                <a href="#" class="btn"><i class="fa fa-shopping-cart"></i> Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>--}}

    <!--==========================
      Newsletter Section
    ============================-->
    <section id="newsletter" class="newsletter text-center wow fadeInUp">
        <div class="overlay padd-section">
            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-md-9 col-lg-6">
                        <form class="form-inline" method="POST" action="{{ route('domain.subscribe-email') }}">
                            @csrf
                            <input type="email" class="form-control @error('subscribe_email') is-invalid @enderror" placeholder="Email Adress" name="subscribe_email">
                            <button type="submit" class="btn btn-default"><i class="fa fa-location-arrow"></i>Subscribe</button>
                            @error('subscribe_email')
                            <span class="invalid-feedback" style="text-align: left;" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </form>

                    </div>
                </div>

                <ul class="list-unstyled">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                </ul>


            </div>
        </div>
    </section>

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="padd-section wow fadeInUp">

        <div class="container">
            <div class="section-title text-center">
                <h2>Contact</h2>
                <p class="separator">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
            </div>
        </div>

        <div class="container">
            <div class="row justify-content-center">

                <div class="col-lg-3 col-md-4">

                    <div class="info">
                        <div>
                            <i class="fa fa-map-marker"></i>
                            <p>A108 Adam Street<br>New York, NY 535022</p>
                        </div>

                        <div class="email">
                            <i class="fa fa-envelope"></i>
                            <p>info@example.com</p>
                        </div>

                        <div>
                            <i class="fa fa-phone"></i>
                            <p>+1 5589 55488 55s</p>
                        </div>
                    </div>

                    <div class="social-links">
                        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                        <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                        <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                    </div>

                </div>

                <div class="col-lg-5 col-md-8">
                    <div class="form">
                        {{--<div id="sendmessage">Your message has been sent. Thank you!</div>
                        <div id="errormessage"></div>--}}
                        <form action="{{ route('domain.contact-admin') }}" method="post" role="form" class="contactForm">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                {{--<div class="validation"></div>--}}
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                {{--<div class="validation"></div>--}}
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                                {{--<div class="validation"></div>--}}
                                @error('subject')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea class="form-control @error('message') is-invalid @enderror" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                                <div class="validation"></div>
                                @error('message')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button type="submit">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- #contact -->
@endsection
@section('footer')

@endsection
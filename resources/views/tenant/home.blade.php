@extends('tenant.layouts.master')
@section('title')
    Home
@endsection
@section('header')
    <style>
        .profuct-img {
            padding: 10px;
        }
        .profuct-img img {
            width:150px;
            height:132px;
            object-fit:cover;
        }
    </style>
@endsection
@section('banner')
    @include('tenant.includes.banner')
@endsection
@section('content')

    <section id="products" class="Material-portfolio-section section-padding section-dark">
        <div class="container">
            <h1 class="section-title">@if(\App\Helpers\GeneralHelper::getCurrentTenant() === env('CLIENT1')) Products @else Requirements @endif</h1>
            <div class="row">

                @if((isset($products)))
                    @foreach($products as $product)
                        <div class="col-md-6 col-lg-3 col-xl-3 wow animated fadeInUp animated" data-wow-delay=".3s" style="visibility: visible;-webkit-animation-delay: .3s; -moz-animation-delay: .3s; animation-delay: .3s;">
                            <div class="single-team-widget">
                                <div class="profuct-img">
                                    @if(isset($product->productAdditional))
                                        <img src="{{asset('public/img/product').'/'.$product->productAdditional->attachment}}" style="width: 235px; height: 132px;" class="img-fluid" alt="">
                                    @else
                                        <img src="{{ asset('public/assets/images/picture.png') }}" style="width: 235px; height: 132px;" class="img-fluid" alt="">
                                    @endif
                                </div>
                                <div class="team-member-info">
                                    <div class="know-more">
                                        <a class="btn btn-round btn-fab btn-xs"
                                           @if(\App\Helpers\GeneralHelper::getCurrentTenant() === env('CLIENT1'))
                                           href="{{ route('customer.place-bid', [$product->id]) }}"
                                           @else
                                           href="{{ route('place-requirement', [$product->id]) }}"
                                            @endif
                                        ><i class="material-icons mdi mdi-arrow-right"></i><div class="ripple-container"></div></a>
                                    </div>
                                    <h2 class="subtitle">{{$product->name}}</h2>
                                    <p>{{ $product->productCategories->name }}</p>
                                    {{--<div class="social-profiles">
                                        <a href="#"><i class="mdi mdi-twitter"></i></a>
                                        <a href="#"><i class="mdi mdi-facebook"></i></a>
                                        <a href="#"><i class="mdi mdi-dribbble"></i></a>
                                        <a href="#"><i class="mdi mdi-linkedin"></i></a>
                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
            {{--<div class="row mt-4 wow animated fadeInUp" data-wow-delay=".3s">
                <div class="col-md-12 text-center">
                    <a href="javascript:void(0)" class="animated4 btn btn-common" data-ripple-color="#000"><i class="material-icons mdi mdi-lightbulb-outline"></i> Browse All<div class="ripple-container"></div></a>
                </div>
            </div>--}}
        </div>
    </section>

    <section id="products" class="Material-portfolio-section section-padding section-dark">
        <div class="container">
            <h1 class="section-title">Categories</h1>
            <div class="row">

                @if((isset($categories)))
                    @foreach($categories as $category)
                        <div class="col-md-6 col-lg-3 col-xl-3 wow animated fadeInUp animated" data-wow-delay=".3s" style="visibility: visible;-webkit-animation-delay: .3s; -moz-animation-delay: .3s; animation-delay: .3s;">
                            <div class="single-team-widget">
                                <div class="profuct-img">
                                    @if(isset($category->image))
                                        <img src="{{asset('public/img/category').'/'.$category->image}}" style="width: 235px; height: 132px;" class="img-fluid" alt="">
                                    @else
                                        <img src="{{ asset('public/assets/images/picture.png') }}" style="width: 235px; height: 132px;" class="img-fluid" alt="">
                                    @endif
                                </div>
                                <div class="team-member-info">
                                    <div class="know-more">
                                        <a class="btn btn-round btn-fab btn-xs"
                                           href="{{ route('place-requirement-using-category', [$category->id]) }}"
                                           ><i class="material-icons mdi mdi-arrow-right"></i><div class="ripple-container"></div></a>
                                    </div>
                                    <h2 class="subtitle">{{$category->name}}</h2>


                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
            {{--<div class="row mt-4 wow animated fadeInUp" data-wow-delay=".3s">
                <div class="col-md-12 text-center">
                    <a href="javascript:void(0)" class="animated4 btn btn-common" data-ripple-color="#000"><i class="material-icons mdi mdi-lightbulb-outline"></i> Browse All<div class="ripple-container"></div></a>
                </div>
            </div>--}}
        </div>
    </section>

    {{--<section class="work-counter-section section-padding">
        <div class="container">
            <div class="row">

                <div class="col-md-3 col-sm-6 work-counter-widget text-center wow animated fadeInUp" data-wow-delay=".2s">
                    <div class="counter">
                        <div class="icon"><i class="material-icons mdi mdi-check-all"></i></div>
                        <div class="timer">347</div>
                        <p>Projects Done</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 work-counter-widget text-center wow animated fadeInUp" data-wow-delay=".3s">
                    <div class="counter">
                        <div class="icon"><i class="material-icons mdi mdi-clock"></i></div>
                        <div class="timer">8896</div>
                        <p>Working Hours</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 work-counter-widget text-center wow animated fadeInUp" data-wow-delay=".4s">
                    <div class="counter">
                        <div class="icon"><i class="material-icons mdi mdi-account-multiple-outline"></i></div>
                        <div class="timer">35</div>
                        <p>Team Members</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 work-counter-widget text-center wow animated fadeInUp" data-wow-delay=".5s">
                    <div class="counter">
                        <div class="icon"><i class="material-icons mdi mdi-sticker-emoji"></i></div>
                        <div class="timer">233</div>
                        <p>Happy Clients</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="team section-padding section-dark">
        <div class="container">
            <div class="row">

                <div class="col-md-12 wow animated fadeInLeft" data-wow-delay=".2s">
                    <h1 class="section-title">Meet The Team</h1>
                </div>
            </div>
            <div class="row">

                <div class="col-md-6 col-lg-3 col-xl-3 wow animated fadeInUp" data-wow-delay=".3s">
                    <div class="single-team-widget">
                        <img src="http://preview.uideck.com/items/material/assets/images/team/team1.jpg" class="img-fluid" alt="">
                        <div class="team-member-info">
                            <div class="know-more">
                                <a class="btn btn-round btn-fab btn-xs" href="javascript:void(0)"><i class="material-icons mdi mdi-arrow-right"></i><div class="ripple-container"></div></a>
                            </div>
                            <h2 class="subtitle">Rob Percy</h2>
                            <p>Co-Founder</p>
                            <div class="social-profiles">
                                <a href="{{ config('app.url') }}#"><i class="mdi mdi-twitter"></i></a>
                                <a href="{{ config('app.url') }}#"><i class="mdi mdi-facebook"></i></a>
                                <a href="{{ config('app.url') }}#"><i class="mdi mdi-dribbble"></i></a>
                                <a href="{{ config('app.url') }}#"><i class="mdi mdi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 col-xl-3 wow animated fadeInUp" data-wow-delay=".4s">
                    <div class="single-team-widget">
                        <img src="http://preview.uideck.com/items/material/assets/images/team/team2.jpg" class="img-fluid" alt="">
                        <div class="team-member-info">
                            <div class="know-more">
                                <a class="btn btn-round btn-fab btn-xs" href="javascript:void(0)"><i class="material-icons mdi mdi-arrow-right"></i><div class="ripple-container"></div></a>
                            </div>
                            <h2 class="subtitle">Jennifer L.</h2>
                            <p>Graphic Designer</p>
                            <div class="social-profiles">
                                <a href="{{ config('app.url') }}#"><i class="mdi mdi-twitter"></i></a>
                                <a href="{{ config('app.url') }}#"><i class="mdi mdi-facebook"></i></a>
                                <a href="{{ config('app.url') }}#"><i class="mdi mdi-dribbble"></i></a>
                                <a href="{{ config('app.url') }}#"><i class="mdi mdi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 col-xl-3 wow animated fadeInUp" data-wow-delay=".5s">
                    <div class="single-team-widget">
                        <img src="http://preview.uideck.com/items/material/assets/images/team/team3.jpg" class="img-fluid" alt="">
                        <div class="team-member-info">
                            <div class="know-more">
                                <a class="btn btn-round btn-fab btn-xs" href="javascript:void(0)"><i class="material-icons mdi mdi-arrow-right"></i><div class="ripple-container"></div></a>
                            </div>
                            <h2 class="subtitle">Tom Hanks.</h2>
                            <p>SEO Speacialist</p>
                            <div class="social-profiles">
                                <a href="{{ config('app.url') }}#"><i class="mdi mdi-twitter"></i></a>
                                <a href="{{ config('app.url') }}#"><i class="mdi mdi-facebook"></i></a>
                                <a href="{{ config('app.url') }}#"><i class="mdi mdi-dribbble"></i></a>
                                <a href="{{ config('app.url') }}#"><i class="mdi mdi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 col-xl-3 wow animated fadeInUp" data-wow-delay=".6s">
                    <div class="single-team-widget">
                        <img src="http://preview.uideck.com/items/material/assets/images/team/team4.jpg" class="img-fluid" alt="">
                        <div class="team-member-info">
                            <div class="know-more">
                                <a class="btn btn-round btn-fab btn-xs" href="javascript:void(0)"><i class="material-icons mdi mdi-arrow-right"></i><div class="ripple-container"></div></a>
                            </div>
                            <h2 class="subtitle">Emma Watson</h2>
                            <p>Head Of Ideas</p>
                            <div class="social-profiles">
                                <a href="{{ config('app.url') }}#"><i class="mdi mdi-twitter"></i></a>
                                <a href="{{ config('app.url') }}#"><i class="mdi mdi-facebook"></i></a>
                                <a href="{{ config('app.url') }}#"><i class="mdi mdi-dribbble"></i></a>
                                <a href="{{ config('app.url') }}#"><i class="mdi mdi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>--}}

    {{--<div class="testimonial section-padding">
        <div class="container">
            <div class="row">

                <div class="testimonials-carousel owl-carousel">
                    <div class="item">
                        <div class="testimonial-item">
                            <div class="datils">
                                <h5>Adam Schwartz</h5>
                                <span>Software Articulate, Google</span>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's <br> standard dummy text ever since the 1500s Lorem Ipsum.</p>
                            </div>
                            <div class="img">
                                <a href="{{ config('app.url') }}#"><img class="img-fluid" src="http://preview.uideck.com/items/material/assets/images/testimonial/author1.jpg" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-item">
                            <div class="datils">
                                <h5>Clark Brown</h5>
                                <span>Brand Managerr</span>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's <br> standard dummy text ever since the 1500s Lorem Ipsum.</p>
                            </div>
                            <div class="img">
                                <a href="{{ config('app.url') }}#"><img class="img-fluid" src="http://preview.uideck.com/items/material/assets/images/testimonial/author2.jpg" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-item">
                            <div class="datils">
                                <h5>Ana Blunt</h5>
                                <span>Creative Director</span>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's <br> standard dummy text ever since the 1500s Lorem Ipsum.</p>
                            </div>
                            <div class="img">
                                <a href="{{ config('app.url') }}#"><img class="img-fluid" src="http://preview.uideck.com/items/material/assets/images/testimonial/author3.jpg" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="Material-blog-section section-padding">
        <div class="container">
            <div class="row">

                <div class="col-md-12 wow animated fadeInLeft" data-wow-delay=".2s">
                    <h1 class="section-title">From The Blog</h1>
                </div>
            </div>
            <div class="row">

                <div class="col-md-6 col-lg-4 col-xl-4 wow animated fadeInUp" data-wow-delay=".3s">
                    <article class="single-blog-post">

                        <div class="featured-image">
                            <a href="{{ config('app.url') }}#">
                                <img src="http://preview.uideck.com/items/material/assets/images/blog/featured1.jpg" alt="">
                            </a>
                        </div>

                        <div class="post-meta">

                            <a href="http://preview.uideck.com/items/material/blog-single.html"><h2 class="subtitle">12+ Amazing Growth Hacking Tips and Tricks</h2></a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio perferendis assumenda ipsum maiores dolorum similique obcaecati perspiciatis.</p>
                        </div>
                        <div class="meta-tags">
                            <span class="comments"><a href="{{ config('app.url') }}#"><i class="mdi mdi-comment-outline"></i> 24 Comments</a></span>

                            <a class="btn btn-round btn-fab" href="http://preview.uideck.com/items/material/blog-single.html"><i class="material-icons mdi mdi-arrow-right"></i><div class="ripple-container"></div></a>
                        </div>
                    </article>
                </div>

                <div class="col-md-6 col-lg-4 col-xl-4 wow animated fadeInUp" data-wow-delay=".4s">
                    <article class="single-blog-post">

                        <div class="featured-image">
                            <a href="{{ config('app.url') }}#">
                                <img src="http://preview.uideck.com/items/material/assets/images/blog/featured2.jpg" alt="">
                            </a>
                        </div>

                        <div class="post-meta">

                            <a href="http://preview.uideck.com/items/material/blog-single.html"><h2 class="subtitle">10 Tips to Validate Your Next Startup Idea</h2></a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio perferendis assumenda ipsum maiores dolorum similique obcaecati perspiciatis.</p>
                        </div>
                        <div class="meta-tags">
                            <span class="comments"><a href="{{ config('app.url') }}#"><i class="mdi mdi-comment-outline"></i> 24 Comments</a></span>

                            <a class="btn btn-round btn-fab" href="http://preview.uideck.com/items/material/blog-single.html"><i class="material-icons mdi mdi-arrow-right"></i><div class="ripple-container"></div></a>
                        </div>
                    </article>
                </div>

                <div class="col-md-6 col-lg-4 col-xl-4 wow animated fadeInUp" data-wow-delay=".5s">
                    <article class="single-blog-post">

                        <div class="featured-image">
                            <a href="{{ config('app.url') }}#">
                                <img src="http://preview.uideck.com/items/material/assets/images/blog/featured3.jpg" alt="">
                            </a>
                        </div>

                        <div class="post-meta">

                            <a href="http://preview.uideck.com/items/material/blog-single.html"><h2 class="subtitle">How to Create Successful Website for Your Agency</h2></a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio perferendis assumenda ipsum maiores dolorum similique obcaecati perspiciatis.</p>
                        </div>
                        <div class="meta-tags">
                            <span class="comments"><a href="{{ config('app.url') }}#"><i class="mdi mdi-comment-outline"></i> 24 Comments</a></span>

                            <a class="btn btn-round btn-fab" href="http://preview.uideck.com/items/material/blog-single.html"><i class="material-icons mdi mdi-arrow-right"></i><div class="ripple-container"></div></a>
                        </div>
                    </article>
                </div>
            </div>
            <div class="row mt-5 wow animated fadeInUp" data-wow-delay=".6s">

                <div class="col-md-12 text-center">
                    <a href="http://preview.uideck.com/items/material/blog.html" class="animated4 btn btn-common" data-ripple-color="#000"><i class="material-icons mdi mdi-library-books"></i> Explore More on Blog<div class="ripple-container"></div></a>
                </div>
            </div>
        </div>
    </section>--}}


    <section class="Material-contact-section section-padding section-dark">
        <div class="container">
            <div class="row">

                <div class="col-md-12 wow animated fadeInLeft" data-wow-delay=".2s">
                    <h1 class="section-title">Love to Hear From You</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mt-3 contact-widget-section2 wow animated fadeInLeft" data-wow-delay=".2s">
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content.</p>
                    <div class="find-widget">
                        <a href="{{ config('app.url') }}#"><i class="material-icons mdi mdi-map-marker"></i>Magarpatta City, Hadapsar, Pune, Maharashtra 411013</a>
                    </div>
                    <div class="find-widget">
                        <a href="{{ config('app.url') }}#"><i class="material-icons mdi mdi-phone"></i> {{ \App\Setting::find(4)->value }}</a>
                    </div>
                    <div class="find-widget">
                        <a href="{{ config('app.url') }}#"><i class="material-icons mdi mdi-email-open mr-3"></i> {{ \App\Setting::find(3)->value }}</a>
                    </div>
                    {{--<div class="find-widget">
                        <a href="{{ config('app.url') }}#"><i class="material-icons mdi mdi-clock"></i> Mon to Sat: 09:30 AM - 10.30 PM</a>
                    </div>--}}
                </div>

                <div class="col-md-6 wow animated fadeInRight" data-wow-delay=".2s">
                    <form class=  "shake" role="form" method="post" action="{{ route('submit-contact-us') }}" id="contactForm1" name="contact-form" data-toggle="validator">
                        @csrf
                        <div class="form-group label-floating">
                            <label class="control-label" for="name">Name</label>
                            <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" required data-error="Please enter your name">
                            @error('name')
                            <div class="help-block with-errors">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group label-floating">
                            <label class="control-label" for="email">Email</label>
                            <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email" required data-error="Please enter your Email">
                            @error('email')
                            <div class="help-block with-errors">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group label-floating">
                            <label class="control-label">Subject</label>
                            <input class="form-control @error('subject') is-invalid @enderror" id="msg_subject" type="text" name="subject" required data-error="Please enter your message subject">
                            @error('subject')
                            <div class="help-block with-errors">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group label-floating">
                            <label for="message" class="control-label">Message</label>
                            <textarea class="form-control @error('message') is-invalid @enderror" rows="3" id="message" name="message" required data-error="Write your message"></textarea>
                            @error('message')
                            <div class="help-block with-errors">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-submit mt-5">
                            <button class="btn btn-common" type="submit" id="form-submit"><i class="material-icons mdi mdi-message-outline"></i> Send Message</button>
                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('footer')

@endsection
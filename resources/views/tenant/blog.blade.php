@php
    $pagetitle = 'KNOW ABOUT OURSELVES';
    $page_sub_title = 'Blogs';
@endphp
@extends('tenant.layouts.master')
@section('title')
    Blogs
@endsection
@section('header')

@endsection
@section('content')
    @include('tenant.includes.breadcrumb')
    <section class="Material-blog-post-page section-padding">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-lg-8 col-xs-12 blog-post-column">
                    <div class="row">

                        <div class="col-md-6 no-padding">
                        @foreach($blogs as $blog )
                            <div class="col-md-12 wow animated fadeInUp animated" data-wow-delay=".2s" style="visibility: visible;-webkit-animation-delay: .2s; -moz-animation-delay: .2s; animation-delay: .2s;">
                                <article class="single-blog-post">

                                    <div class="featured-image">
                                        <a href="#">
                                            <img style="height: 100px" src="{{asset('public/img/blog/'.$blog->image)}}" alt="">
                                        </a>
                                    </div>

                                    <div class="post-meta">
                                        <div class="post-date">
                                            <span><b>{{date('M j Y', strtotime($blog->created_at))}}</b></span>
                                        </div>

                                        <a href="blog-single.html"><h2 class="subtitle">{{$blog->title}}</h2></a>
                                        <p>{{$blog->description}}</p>
                                    </div>
                                    <div class="meta-tags">
                                        <span class="comments"><a href="#"><i class="mdi mdi-comment-outline"></i> 24 Comments</a></span>

                                        <a class="btn btn-round btn-fab" href="{{route('blog-detail',$blog->id)}}"><i class="material-icons mdi mdi-arrow-right"></i><div class="ripple-container"></div></a>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                            <div class="col-md-12  wow animated fadeInUp animated" data-wow-delay=".3s" style="visibility: visible;-webkit-animation-delay: .3s; -moz-animation-delay: .3s; animation-delay: .3s;">
                                <article class="single-blog-post">

                                    <div class="featured-image">
                                        <a href="#">
                                            <img src="assets/images/blog/featured2.jpg" alt="">
                                        </a>
                                    </div>

                                    <div class="post-meta">
                                        <div class="post-date">
                                            <span><b>Feb 25 2020</b></span>
                                        </div>

                                        <a href="blog-single.html"><h2 class="subtitle">Kelly Grover</h2></a>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio perferendis assumenda ipsum maiores dolorum similique obcaecati perspiciatis.</p>
                                    </div>
                                    <div class="meta-tags">
                                        <span class="comments"><a href="#"><i class="mdi mdi-comment-outline"></i> 24 Comments</a></span>

                                        <a class="btn btn-round btn-fab" href="blog-single.html"><i class="material-icons mdi mdi-arrow-right"></i><div class="ripple-container"></div></a>
                                    </div>
                                </article>
                            </div>

                            <div class="col-md-12 wow animated fadeInUp" data-wow-delay=".4s" style="visibility: hidden; -webkit-animation-name: none; -moz-animation-name: none; animation-name: none;-webkit-animation-delay: .4s; -moz-animation-delay: .4s; animation-delay: .4s;">
                                <article class="single-blog-post ">

                                    <div class="featured-image">
                                        <a href="#">
                                            <img src="assets/images/blog/featured3.jpg" alt="">
                                        </a>
                                    </div>

                                    <div class="post-meta">
                                        <div class="post-date">
                                            <span><b>Mar 25 2020</b></span>
                                        </div>

                                        <a href="blog-single.html"><h2 class="subtitle">We support your custom</h2></a>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio perferendis assumenda ipsum maiores dolorum similique obcaecati perspiciatis.</p>
                                    </div>
                                    <div class="meta-tags">
                                        <span class="comments"><a href="#"><i class="mdi mdi-comment-outline"></i> 24 Comments</a></span>

                                        <a class="btn btn-round btn-fab" href="blog-single.html"><i class="material-icons mdi mdi-arrow-right"></i><div class="ripple-container"></div></a>
                                    </div>
                                </article>
                            </div>

                            <div class="col-md-12 wow animated fadeInUp" data-wow-delay=".5s" style="visibility: hidden; -webkit-animation-name: none; -moz-animation-name: none; animation-name: none;-webkit-animation-delay: .5s; -moz-animation-delay: .5s; animation-delay: .5s;">
                                <article class="single-blog-post">

                                    <div class="featured-image">
                                        <a href="#">
                                            <img src="assets/images/blog/featured4.jpg" alt="">
                                        </a>
                                    </div>

                                    <div class="post-meta">
                                        <div class="post-date">
                                            <span><b>April 25 2020</b></span>
                                        </div>

                                        <a href="blog-single.html"><h2 class="subtitle">We love photography</h2></a>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio perferendis assumenda ipsum maiores dolorum similique obcaecati perspiciatis.</p>
                                    </div>
                                    <div class="meta-tags">
                                        <span class="comments"><a href="#"><i class="mdi mdi-comment-outline"></i> 24 Comments</a></span>

                                        <a class="btn btn-round btn-fab" href="blog-single.html"><i class="material-icons mdi mdi-arrow-right"></i><div class="ripple-container"></div></a>
                                    </div>
                                </article>
                            </div>
                        </div>

                        <div class="col-md-6 no-padding">

                            <div class="col-md-12 wow animated fadeInUp animated" data-wow-delay=".3s" style="visibility: visible;-webkit-animation-delay: .3s; -moz-animation-delay: .3s; animation-delay: .3s;">
                                <article class="single-blog-post">

                                    <div class="featured-image">
                                        <a href="#">
                                            <img src="assets/images/blog/featured5.jpg" alt="">
                                        </a>
                                    </div>

                                    <div class="post-meta">
                                        <div class="post-date">
                                            <span><b>Sep 25 2020</b></span>
                                        </div>

                                        <a href="blog-single.html"><h2 class="subtitle">Kelly Grover</h2></a>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio perferendis assumenda ipsum maiores dolorum similique obcaecati perspiciatis.</p>
                                    </div>
                                    <div class="meta-tags">
                                        <span class="comments"><a href="#"><i class="mdi mdi-comment-outline"></i> 24 Comments</a></span>

                                        <a class="btn btn-round btn-fab" href="blog-single.html"><i class="material-icons mdi mdi-arrow-right"></i><div class="ripple-container"></div></a>
                                    </div>
                                </article>
                            </div>

                            <div class="col-md-12 wow animated fadeInUp animated" data-wow-delay=".5s" style="visibility: visible;-webkit-animation-delay: .5s; -moz-animation-delay: .5s; animation-delay: .5s;">
                                <article class="single-blog-post">

                                    <div class="featured-image">
                                        <a href="#">
                                            <img src="assets/images/blog/featured6.jpg" alt="">
                                        </a>
                                    </div>

                                    <div class="post-meta">
                                        <div class="post-date">
                                            <span><b>Oct 25 2020</b></span>
                                        </div>

                                        <a href="blog-single.html"><h2 class="subtitle">Kelly Grover</h2></a>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio perferendis assumenda ipsum maiores dolorum similique obcaecati perspiciatis.</p>
                                    </div>
                                    <div class="meta-tags">
                                        <span class="comments"><a href="#"><i class="mdi mdi-comment-outline"></i> 24 Comments</a></span>

                                        <a class="btn btn-round btn-fab" href="blog-single.html"><i class="material-icons mdi mdi-arrow-right"></i><div class="ripple-container"></div></a>
                                    </div>
                                </article>
                            </div>

                            <div class="col-md-12 wow animated fadeInUp" data-wow-delay=".6s" style="visibility: hidden; -webkit-animation-name: none; -moz-animation-name: none; animation-name: none;-webkit-animation-delay: .6s; -moz-animation-delay: .6s; animation-delay: .6s;">
                                <article class="single-blog-post">

                                    <div class="featured-image">
                                        <a href="#">
                                            <img src="assets/images/blog/featured7.jpg" alt="">
                                        </a>
                                    </div>

                                    <div class="post-meta">
                                        <div class="post-date">
                                            <span><b>Nov 25 2020</b></span>
                                        </div>

                                        <a href="blog-single.html"><h2 class="subtitle">Kelly Grover</h2></a>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio perferendis assumenda ipsum maiores dolorum similique obcaecati perspiciatis.</p>
                                    </div>
                                    <div class="meta-tags">
                                        <span class="comments"><a href="#"><i class="mdi mdi-comment-outline"></i> 24 Comments</a></span>

                                        <a class="btn btn-round btn-fab" href="blog-single.html"><i class="material-icons mdi mdi-arrow-right"></i><div class="ripple-container"></div></a>
                                    </div>
                                </article>
                            </div>

                            <div class="col-md-12 wow animated fadeInUp" data-wow-delay=".7s" style="visibility: hidden; -webkit-animation-name: none; -moz-animation-name: none; animation-name: none;-webkit-animation-delay: .7s; -moz-animation-delay: .7s; animation-delay: .7s;">
                                <article class="single-blog-post">

                                    <div class="featured-image">
                                        <a href="#">
                                            <img src="assets/images/blog/featured8.jpg" alt="">
                                        </a>
                                    </div>

                                    <div class="post-meta">
                                        <div class="post-date">
                                            <span><b>Dec 25 2020</b></span>
                                        </div>

                                        <a href="blog-single.html"><h2 class="subtitle">Kelly Grover</h2></a>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio perferendis assumenda ipsum maiores dolorum similique obcaecati perspiciatis.</p>
                                    </div>
                                    <div class="meta-tags">
                                        <span class="comments"><a href="#"><i class="mdi mdi-comment-outline"></i> 24 Comments</a></span>

                                        <a class="btn btn-round btn-fab" href="blog-single.html"><i class="material-icons mdi mdi-arrow-right"></i><div class="ripple-container"></div></a>
                                    </div>
                                </article>
                            </div>
                        </div>

                        <div class="col-md-12 text-center mt-3 blog-pagination wow animated fadeInUp" data-wow-delay=".4s" style="visibility: hidden; -webkit-animation-name: none; -moz-animation-name: none; animation-name: none;-webkit-animation-delay: .4s; -moz-animation-delay: .4s; animation-delay: .4s;">
                            <a href="javascript:void(0)" class="btn btn-common"><i class="material-icons mdi mdi mdi-autorenew"></i> Load More Stories<div class="ripple-container"></div></a>
                        </div>

                    </div>
                </div>


                <div class="col-md-12 col-lg-4 col-xs-12 blog-sidebar-column">

                    <aside class="col-md-12 single-sidebar-widget author-widget no-padding wow animated fadeInUp animated" data-wow-delay=".2s" style="visibility: visible;-webkit-animation-delay: .2s; -moz-animation-delay: .2s; animation-delay: .2s;">
                        <div class="author-bg">
                            <img src="assets/images/blog/author-bg.jpg" alt="">
                        </div>
                        <div class="author-info">
                            <div class="author-name">
                                <div class="author-intro">
                                    <h3>Jhon Doe</h3>
                                    <p>Front End Developer</p>
                                </div>
                                <div class="author-image">
                                    <img src="assets/images/blog/author.jpg" class="img-circle" alt="">
                                </div>
                            </div>
                            <div class="author-bio">
                                <p>While you are planning for a trip then you always search for a best place to visit because that time you have looked for many of places in your mind. Same time, when the thought of Shimla comes in your mind, you stop the thoughts about other places because the gorgeousness of natural beauty of Shimla.</p>
                            </div>
                        </div>
                    </aside>

                    <aside class="col-md-12 single-sidebar-widget subscribe-widget no-padding  wow animated fadeInUp animated" data-wow-delay=".3s" style="visibility: visible;-webkit-animation-delay: .3s; -moz-animation-delay: .3s; animation-delay: .3s;">
                        <div class="sidebar-widget-title">
                            <h2>Follow &amp; Subscribe</h2>
                        </div>
                        <div class="social-profiles clearfix">
                            <div class="footer-contact-widget">
                                <ul>
                                    <li>
                                        <a href="#"><i class="mdi mdi-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="mdi mdi-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="mdi mdi-dribbble"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="mdi mdi-github-circle"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="mdi mdi-linkedin"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="subscribe-box">
                            <p>Sign up for new Shelver content, updates,<br>surveys &amp; offers.</p>
                            <div class="input-group">
                                <div class="form-group is-empty"><input type="email" class="form-control" placeholder="type your email"></div>
                                <span class="input-group-btn">
<button class="btn btn-round btn-fab" type="button"><i class="material-icons mdi mdi-arrow-right"></i></button>
</span>
                            </div>

                        </div>
                    </aside>

                    <aside class="col-md-12 single-sidebar-widget flickr-widget no-padding wow animated fadeInUp" data-wow-delay=".4s" style="visibility: hidden; -webkit-animation-name: none; -moz-animation-name: none; animation-name: none;-webkit-animation-delay: .4s; -moz-animation-delay: .4s; animation-delay: .4s;">
                        <div class="sidebar-widget-title">
                            <h2>Categories</h2>
                        </div>
                        <ul class="categories-list">
                            <li><a href="#">Lifestyle (21)</a></li>
                            <li><a href="#">Photography (19)</a></li>
                            <li><a href="#">Journal (16)</a></li>
                            <li><a href="#">Works (7)</a></li>
                        </ul>
                    </aside>

                    <aside class="col-md-12 single-sidebar-widget instagram-widget no-padding wow animated fadeInUp" data-wow-delay=".3s" style="visibility: hidden; -webkit-animation-name: none; -moz-animation-name: none; animation-name: none;-webkit-animation-delay: .3s; -moz-animation-delay: .3s; animation-delay: .3s;">
                        <div class="sidebar-widget-title">
                            <h2>Instagram Feed</h2>
                        </div>
                        <div class="instagram-feed clearfix">
                            <ul>
                                <li><a href="#"><img src="assets/images/Instagram/insta1.jpg" alt=""></a></li>
                                <li><a href="#"><img src="assets/images/Instagram/insta2.jpg" alt=""></a></li>
                                <li><a href="#"><img src="assets/images/Instagram/insta3.jpg" alt=""></a></li>
                                <li><a href="#"><img src="assets/images/Instagram/insta4.jpg" alt=""></a></li>
                                <li><a href="#"><img src="assets/images/Instagram/insta5.jpg" alt=""></a></li>
                                <li><a href="#"><img src="assets/images/Instagram/insta6.jpg" alt=""></a></li>
                            </ul>
                        </div>
                    </aside>

                    <aside class="col-md-12 single-sidebar-widget flickr-widget no-padding wow animated fadeInUp" data-wow-delay=".4s" style="visibility: hidden; -webkit-animation-name: none; -moz-animation-name: none; animation-name: none;-webkit-animation-delay: .4s; -moz-animation-delay: .4s; animation-delay: .4s;">
                        <div class="sidebar-widget-title">
                            <h2>Flickr Slider</h2>
                        </div>
                        <div class="flickr-feed clearfix">
                            <div id="flickr-carousel" class="owl-carousel owl-theme" style="opacity: 1; display: block;">
                                <div class="owl-wrapper-outer"><div class="owl-wrapper" style="width: 1860px; left: 0px; display: block; transition: all 1000ms ease 0s; transform: translate3d(0px, 0px, 0px);"><div class="owl-item" style="width: 310px;"><div class="item active">
                                                <img class="img-fluid" src="assets/images/Instagram/flickr1.jpg" alt="">
                                            </div></div><div class="owl-item" style="width: 310px;"><div class="item">
                                                <img class="img-fluid" src="assets/images/Instagram/flickr2.jpg" alt="">
                                            </div></div><div class="owl-item" style="width: 310px;"><div class="item">
                                                <img class="img-fluid" src="assets/images/Instagram/flickr3.jpg" alt="">
                                            </div></div></div></div>


                            </div>
                        </div>
                    </aside>
                </div>

            </div>
        </div>
    </section>
@endsection
@section('footer')
@endsection
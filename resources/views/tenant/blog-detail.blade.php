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

{{--
<div class="container">
    <div class="well">
        <div class="row">
            <div class="col-md-12">
                <br>
                <div class="pull-left col-md-4 col-xs-12 thumb-contenido"><img style="max-width: 500px; max-height: 355px" class="center-block img-responsive" src='{{asset('public/img/blog/'.$blog->image)}}' /></div>
                <div class="">
                    <h1  class="hidden-xs hidden-sm" style="color: #f5ad6b">{{$blog->title}}</h1>
                    <hr>
                    <small>{!! $date_format !!}</small><br>
                    --}}
{{--<small><strong>Author</strong></small>--}}{{--

                    <hr>
                    <p class="text-justify">{{$blog->description}}</p></div>
            </div>
        </div>
    </div>
</div>
--}}
<section class="Material-blog-post-page section-padding">
    <div class="container">
        <div class="row">

            <div class="single-blog-page col-md-12 col-lg-8 col-xs-12">
                <article class="single-post wow fadeInUp animated" data-wow-delay=".2s">
                    <div class="post-image">
                        <img src="{{asset('public/img/blog/'.$blog->image)}}" class="img-fluid" alt="">
                    </div>
                    <h2>The best, free Stock Photography and Video resources</h2>
                    <p><b>Lorem ipsum</b> dolor sit amet, consectetur adipisicing elit. Harum minima, earum optio quia recusandae ipsam, obcaecati! Sunt ullam nisi, ratione quisquam provident eius quae facilis eos, deserunt consequatur, officiis quos.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta reiciendis illum possimus et ducimus quia sed dolorum id cumque rerum, fuga voluptatem, fugiat quidem mollitia eos vel, nisi voluptatum corrupti eaque voluptas! Praesentium hic pariatur est voluptatibus suscipit vel tempora necessitatibus animi ratione tempore natus modi, odit, explicabo nulla laudantium veritatis dignissimos? Odit sequi, ipsam quod eligendi tempore obcaecati reprehenderit, dicta repudiandae officiis voluptatibus odio cupiditate, tempora repellat ut. Possimus odit veritatis fugiat dolorem accusamus, facilis excepturi.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus magni ad sapiente optio illo iste quidem quod voluptatibus, eligendi aliquid?</p>
                    <blockquote>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis harum laborum praesentium obcaecati nam explicabo?</p>
                    </blockquote>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam quas quibusdam magnam asperiores laudantium rerum a, illo illum dolore amet. Adipisci vel, vero a minus nemo voluptatem. Vel ipsa totam veniam corporis quia, ipsum asperiores rem, eveniet, hic aut fuga.</p>
                    <div class="single-post-meta">
                        <div class="post-tag">
                            <a href="#"><i class="material-icons mdi mdi-bookmark-outline"></i> Photography, Image</a>
                        </div>
                        <div class="share-post">
                            <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-google-plus"></i></a> <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </article>
                <div class="users-comment-section mt-2 wow animated fadeInUp" data-wow-delay=".3s">
                    <ul>
                        <li class="media">
                            <div class="media-left">
                                <img src="assets/images/blog/comment1.jpg" alt="">
                            </div>
                            <div class="media-body">
                                <a href="#"><h3>Jhon Doe</h3></a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe deleniti accusantium earum vitae aperiam eos dolorum quidem, architecto tenetur molestiae!</p>
                                <a href="#" class="replay">Reply</a>

                                <div class="media">
                                    <div class="media-left">
                                        <img src="assets/images/blog/comment2.jpg" alt="">
                                    </div>
                                    <div class="media-body">
                                        <a href="#"><h3>Cristiana</h3></a>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe deleniti accusantium earum vitae aperiam eos dolorum quidem, architecto tenetur molestiae!</p>
                                        <a href="#" class="replay">Reply</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-left">
                                <img src="assets/images/blog/comment3.jpg" alt="">
                            </div>
                            <div class="media-body">
                                <a href="#"><h3>Javed</h3></a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe deleniti accusantium earum vitae aperiam eos dolorum quidem, architecto tenetur molestiae!</p>
                                <a href="#" class="replay">Reply</a>
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-left">
                                <img src="assets/images/blog/comment4.jpg" alt="">
                            </div>
                            <div class="media-body">
                                <a href="#"><h3>Larry Page</h3></a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe deleniti accusantium earum vitae aperiam eos dolorum quidem, architecto tenetur molestiae!</p>
                                <a href="#" class="replay">Reply</a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="comment-box row x mt-5 clearfix wow fadeInUp animated" data-wow-delay=".4s">
                    <div class="col-md-4 ">
                        <div class="form-group label-floating">
                            <label class="sr-only" for="name">Email</label>
                            <input type="text" placeholder="Your Name" id="name" required="" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <div class="form-group label-floating">
                            <label class="sr-only" for="useremail">Email</label>
                            <input type="email" placeholder="Email Address" id="useremail" required="" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group label-floating">
                            <label class="sr-only" for="userurl">Website</label>
                            <input type="text" placeholder="Your Website" id="userurl" required="" class="form-control">
                        </div>
                    </div>
                    <div class="form-group label-floating col-md-12">
                        <label class="sr-only" for="usermessage">Message</label>
                        <textarea placeholder="Type here message" id="usermessage" rows="7" required="" class="form-control"></textarea>
                    </div>
                    <a href="javascript:void(0)" class="mt-3 btn btn-common"><i class="mdi mdi-message-text"></i> Post Comment<div class="ripple-container"></div></a>
                </div>
            </div>

            <div class="col-md-12 col-lg-4 col-xs-12 blog-sidebar-column">

                <aside class="col-md-12 single-sidebar-widget author-widget no-padding wow animated fadeInUp" data-wow-delay=".2s">
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

                <aside class="col-md-12 single-sidebar-widget subscribe-widget no-padding  wow animated fadeInUp" data-wow-delay=".3s">
                    <div class="sidebar-widget-title">
                        <h2>Follow & Subscribe</h2>
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
                        <p>Sign up for new Shelver content, updates,<br>surveys & offers.</p>
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="type your email">
                            <span class="input-group-btn">
<button class="btn btn-round btn-fab" type="button"><i class="material-icons mdi mdi-arrow-right"></i></button>
</span>
                        </div>
                    </div>
                </aside>

                <aside class="col-md-12 single-sidebar-widget flickr-widget no-padding wow animated fadeInUp" data-wow-delay=".4s">
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

                <aside class="col-md-12 single-sidebar-widget instagram-widget no-padding wow animated fadeInUp" data-wow-delay=".3s">
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

                <aside class="col-md-12 single-sidebar-widget flickr-widget no-padding wow animated fadeInUp" data-wow-delay=".4s">
                    <div class="sidebar-widget-title">
                        <h2>Flickr Slider</h2>
                    </div>
                    <div class="flickr-feed clearfix">
                        <div id="flickr-carousel" class="owl-carousel owl-theme">
                            <div class="item active">
                                <img class="img-fluid" src="assets/images/Instagram/flickr1.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-fluid" src="assets/images/Instagram/flickr2.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-fluid" src="assets/images/Instagram/flickr3.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </aside>
            </div>

        </div>
    </div>
</section>


@include('tenant.includes.footer')
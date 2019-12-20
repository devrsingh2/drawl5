@php
$pagetitle = 'FEEL FREE TO';
$page_sub_title = 'Contact Us';
@endphp
@extends('tenant.layouts.master')
@section('title')
    Contact Us
@endsection
@section('header')

@endsection
@section('content')
    @include('tenant.includes.breadcrumb')

    <section class="Material-contact-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="contact-title text-center wow animated fadeInDown animated" data-wow-delay=".2s" style="visibility: visible;-webkit-animation-delay: .2s; -moz-animation-delay: .2s; animation-delay: .2s;">We’re always here to hear form you</h1>
                </div>
            </div>
            <div class="row mt-5">

                {{--<div class="col-md-6 contact-widget-section2 wow fadeInUp animated animated" data-wow-delay=".5s" style="visibility: visible;-webkit-animation-delay: .5s; -moz-animation-delay: .5s; animation-delay: .5s;">--}}
                    {{--<h2 class="subtitle">Find Us</h2>--}}
                    {{--<div class="find-widget">--}}
                        {{--<a href="#"><i class="material-icons mdi mdi-home"></i> Magarpatta City, Hadapsar, Pune, Maharashtra 411013</a>--}}
                    {{--</div>--}}
                    {{--<div class="find-widget">--}}
                        {{--<a href="#"><i class="material-icons mdi mdi-email"></i> {{ \App\Setting::find(4)->value }}</a>--}}
                    {{--</div>--}}
                    {{--<div class="find-widget">--}}
                        {{--<a href="#"><i class="material-icons mdi mdi-phone mr-3"></i> {{ \App\Setting::find(3)->value }}</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="col-md-6">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3025.99840723707!2d-73.94718868483281!3d40.67400404787648!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDDCsDQwJzI2LjQiTiA3M8KwNTYnNDIuMCJX!5e0!3m2!1sen!2sbd!4v1515262984139" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen=""></iframe>
                </div>
                <div class="col-md-6 wow animated fadeInRight" data-wow-delay=".2s">
                    <form class="shake" role="form" method="post" action="{{ route('submit-contact-us') }}" id="contactForm1" name="contact-form" data-toggle="validator">
                        @csrf
                        <div class="form-group label-floating">
                            <label class="control-label" for="name">Name</label>
                            <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" data-error="Please enter your name">
                            @error('name')
                            <div class="help-block with-errors">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group label-floating">
                            <label class="control-label" for="email">Email</label>
                            <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email" data-error="Please enter your Email">
                            @error('email')
                            <div class="help-block with-errors">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group label-floating">
                            <label class="control-label">Subject</label>
                            <input class="form-control @error('subject') is-invalid @enderror" id="msg_subject" type="text" name="subject" data-error="Please enter your message subject">
                            @error('subject')
                            <div class="help-block with-errors">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group label-floating">
                            <label for="message" class="control-label">Message</label>
                            <textarea class="form-control @error('message') is-invalid @enderror" rows="3" id="message" name="message" data-error="Write your message"></textarea>
                            @error('message')
                            <div class="help-block with-errors">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-submit mt-5">
                            <button class="btn btn-outline-primary" type="submit" id="form-submit"><i class="material-icons mdi mdi-message-outline"></i> Send Message</button>
                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    {{--<section id="google-map-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3025.99840723707!2d-73.94718868483281!3d40.67400404787648!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDDCsDQwJzI2LjQiTiA3M8KwNTYnNDIuMCJX!5e0!3m2!1sen!2sbd!4v1515262984139" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
    </section>--}}

@endsection
@section('footer')
@endsection
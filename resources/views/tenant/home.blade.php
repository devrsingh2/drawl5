@extends('tenant.layouts.master')
@section('title')
    Home
@endsection
@section('header')

@endsection
@section('banner')
    @include('tenant.includes.banner')
@endsection
@section('content')
    <!-- Features Area Start -->
    <section class="qtcls-features-area bg-gray section-padding-100">
        <div class="container">
            <div class="row">
                <!-- Section Heading -->
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>Overall Features</h2>
                        {{--<p>Our revolutionary Cloud solution is powerful, simple, and surprisingly affordable.</p>--}}
                        <p>Our revolutionary Development solution is powerful, simple, and surprisingly affordable.</p>
                    </div>
                </div>
            </div>

            <div class="row">

                <!-- Single Feature Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-feature-area d-flex mb-50">
                        <div class="feature-icon">
                            <i class="icon_adjust-vert"></i>
                        </div>
                        <div class="feature-text">
                            <h5>Customized Solution</h5>
                            <p>Data extraction from drawing sheet with Image Processing.</p>
                        </div>
                    </div>
                </div>

                <!-- Single Feature Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-feature-area d-flex mb-50">
                        <div class="feature-icon">
                            <i class="icon_cloud-upload_alt"></i>
                        </div>
                        <div class="feature-text">
                            <h5>CNC Services</h5>
                            <p>CNC Machines (New / Used).</p>
                        </div>
                    </div>
                </div>

                <!-- Single Feature Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-feature-area d-flex mb-50">
                        <div class="feature-icon">
                            <i class="icon_archive_alt"></i>
                        </div>
                        <div class="feature-text">
                            <h5>Product Sales</h5>
                            <p>Plant Manager, An IoT base PPC (Production Planning and Control) Software which performs as a crucial Shop Floor Management.</p>
                        </div>
                    </div>
                </div>

                <!-- Single Feature Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-feature-area d-flex mb-50">
                        <div class="feature-icon">
                            <i class="icon_globe-2"></i>
                        </div>
                        <div class="feature-text">
                            <h5>International Marketing</h5>
                            <p>Representation of Company at International Trade Shows.</p>
                        </div>
                    </div>
                </div>

                <!-- Single Feature Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-feature-area d-flex mb-50">
                        <div class="feature-icon">
                            <i class="icon_shield"></i>
                        </div>
                        <div class="feature-text">
                            <h5>Prototyping and Part Manufacturing</h5>
                            <p>Comparison on Technical and Commercial aspects in 3D-Printing and Conventional prototyping techniques for your product.</p>
                        </div>
                    </div>
                </div>

                <!-- Single Feature Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-feature-area d-flex mb-50">
                        <div class="feature-icon">
                            <i class="icon_headphones"></i>
                        </div>
                        <div class="feature-text">
                            <h5>Free Support</h5>
                            <p>Don't be distracted by criticism. Remember the only taste of success some people.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Feature Pattern -->
        <div class="feature-pattern">
            <img src="{{ asset('assets/tenant/frontend/img/core-img/welcome-pattern.png') }}" alt="">
        </div>
    </section>
    <!-- Features Area End -->

@endsection
@section('footer')

@endsection
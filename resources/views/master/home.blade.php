@extends('master.layouts.default')
@section('title', 'Application Dashboard')
@section('banner')
    @include('master.includes.banner')
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

    <!-- About US Area Start -->
    <section class="qtcls-price-plan-area mt-50">
        <div class="container">
            <div class="row">
                <!-- Section Heading -->
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>About Us</h2>
                        <p>We are alumni of IIT Bombay, with background and industrial experience in design of products, and manufacturing.We have started this company with the aim of creating value through process improvement and value addition in the manufacturing services in India.We have worked with international clients and are involved in innovative national consortia for advancing of Industrial engineering in the country, especially in terms of acceptability and readiness of the industry in accepting industry 4.0 [http://indacsm.iiti.ac.in].We are involved in providing value-adding services to the manufacturing MSME sector in India.</p>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- About US Area End -->

    <!-- Vision Area Start -->
    <section class="qtcls-price-plan-area mt-50">
        <div class="container">
            <div class="row">
                <!-- Section Heading -->
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>Vision</h2>
                        <p>To reduce inefficiencies in processes in the manufacturing sector and increase value to the customer through technology enabled services and generate value for the ecosystem.</p>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Vision Area End -->


    <!-- Support Area Start -->
    {{--<section class="qtcls-support-area bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="support-text">
                        <h2>Need help? Call our award-winning support team 24/7: +65 1234-6868</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="support-pattern" style="background-image: url(img/core-img/support-pattern.png);"></div>
    </section>--}}
    <!-- Support Area End -->

    <!-- Call To Action Area Start -->
    {{--<section class="qtcls-cta-area">
        <div class="container">
            <div class="cta-text">
                <h2>Proudly Hosting Over <span class="counter">800,000</span> Websites Since 2000</h2>
            </div>
        </div>
    </section>--}}
@endsection
@section('footer')

@endsection
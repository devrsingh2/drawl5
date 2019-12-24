<footer class="footer-area section-padding-80-0">
    <!-- Main Footer Area -->
    <div class="main-footer-area">
        <div class="container">
            <div class="row justify-content-between">

                <div class="col-6 col-sm-4 col-lg-2">
                    <div class="single-footer-widget mb-80">
                        <!-- Widget Title -->
                        <h5 class="widget-title">Services</h5>

                        <!-- Footer Nav -->
                        <ul class="footer-nav">
                            <li><a href="#">CAD</a></li>
                            <li><a href="#">CAM</a></li>
                            <li><a href="#">Customised solution</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-6 col-sm-4 col-lg-2">
                    <div class="single-footer-widget mb-80">
                        <!-- Widget Title -->
                        <h5 class="widget-title">Products</h5>
                        <!-- Footer Nav -->
                        <ul class="footer-nav">
                            <li><a href="#">Print manager</a></li>
                            <li><a href="#">Machine scope</a></li>
                            <li><a href="#">CNC machines</a></li>
                            <li><a href="#">Torque wrench</a></li>
                            <li><a href="#">QC data collector</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-6 col-sm-4 col-lg-2">
                    <div class="single-footer-widget mb-80">
                        <!-- Widget Title -->
                        <h5 class="widget-title">Company</h5>

                        <!-- Footer Nav -->
                        <ul class="footer-nav">
                            <li><a href="#">About</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Terms of service</a></li>
                            <li><a href="#">Privacy policy</a></li>
                            <li><a href="#">Blog</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Single Footer Widget Area -->
                <div class="col-12 col-sm-8 col-lg-4">
                    <div class="single-footer-widget mb-80">
                        <!-- Widget Title -->
                        <h5 class="widget-title">Subscribe Newsletter</h5>

                        <p>Subscribe to our email newsletter for useful tips and valuable resources.</p>

                        <!-- Newsletter Form -->
                        <form action="{{ route('home') }}" class="nl-form">
                            <input type="email" class="form-control" placeholder="Your Mail">
                            <button type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                        </form>

                        <!-- Social Info -->
                        <div class="social-info">
                            <a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#" class="google-plus"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                            <a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            <a href="#" class="youtube"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Bottom Footer Area -->
    {{--<div class="bottom-footer-area bg-gray">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-6">
                    <div class="copywrite-text">
                        <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i style="color: red" class="fa fa-heart-o" aria-hidden="true"></i> by <a href="{{ config('app.url') }}" target="_blank">{{ config('app.name') }}</a></p>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="payments-methods d-flex align-items-center">
                        <p>Payments We Accept</p>
                        <i class="fa fa-cc-visa" aria-hidden="true"></i>
                        <i class="fa fa-cc-mastercard" aria-hidden="true"></i>
                        <i class="fa fa-cc-discover" aria-hidden="true"></i>
                        <i class="fa fa-cc-amex" aria-hidden="true"></i>
                        <i class="fa fa-cc-paypal" aria-hidden="true"></i>
                        <i class="fa fa-cc-stripe" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>--}}
</footer>
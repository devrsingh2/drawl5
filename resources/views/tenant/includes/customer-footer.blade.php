<footer class="bg-light py-5">
    <div class="container">
        <div class="small text-center text-muted">Copyright &copy; {{ date('Y') }} - {{ \App\Setting::find(1)->value }}</div>
    </div>
</footer>

</div>
</div>
</div>
<script src="{{asset('public/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('public/js/customer.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script src="{{asset('public/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Plugin JavaScript -->
<script src="{{asset('public/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('public/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
<!-- Custom scripts for this template -->
<script src="{{asset('public/js/creative.min.js')}}"></script>
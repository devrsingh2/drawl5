<link href="{{ asset('public/css/toastr.min.css') }}" rel="stylesheet">
<script type="text/javascript">
    $(document).ready(function() {
        // Override global options
        @if (Session::get('alert-class') == "alert-success")
        toastr.success('{{Session::get('message')}}', 'Success', {timeOut: 0,extendedTimeOut: 60000, closeButton: true,"positionClass": "toast-bottom-right"})
        @elseif(Session::get('alert-class') == "alert-danger")
        toastr.error('{{Session::get('message')}}', 'Error', {timeOut: 0,extendedTimeOut: 60000, closeButton: true,"positionClass": "toast-bottom-right"})
        @elseif(Session::get('alert-class') == "alert-warning")
        toastr.warning('{{Session::get('message')}}', 'Warning', {timeOut: 0,extendedTimeOut: 60000, closeButton: true,"positionClass": "toast-bottom-right"})
        @elseif(Session::get('alert-class') == "alert-info")
        toastr.info('{{Session::get('message')}}', 'Info', {timeOut: 0,extendedTimeOut: 60000, closeButton: true,"positionClass": "toast-bottom-right"})
        @endif
    });
</script>
<script defer src="{{ asset('public/js/toastr.min.js') }}" type="text/javascript" ></script>
@extends('tenant.user.layouts.app')
@section('header')
    <link rel="stylesheet" href="{{ asset('assets/tenant/customize/drawing.css') }}" />
@endsection
@section('content')
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Cycle Time Calculation</h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Profile</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                {{--<div class="card-title">
                                    <h4>Profile</h4>
                                </div>--}}
                                <div class="card-body">
                                    <div class="basic-form">
                                        @include('tenant.user.includes.validation-messages')
                                        <form class="frm_uploader" id="upload_file" method="post" enctype="multipart/form-data" action="{{ route('user.upload-drawing') }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="alert alert-danger error-msg" style="display:none">
                                                        <ul></ul>
                                                    </div>
                                                    <div class="main-card mb-3 card">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Choose MC Type:</h5>
                                                            <div class="position-relative form-group">
                                                                <div>
                                                                    <input name="mc_type" id="mc_type" type="file" class="form-control-file">
                                                                    <small class="form-text text-muted">MC Type should be like(PDF/JPG/TIFF)</small>
                                                                </div>
                                                            </div>
                                                            <div class="pull-right">
                                                                <button class="btn btn-primary" name="upload_drawing" id="upload_drawing" type="button">Upload Drawing</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="main-card mb-3 card">
                                                        <div class="card-body"><h5 class="card-title">Drawing Tool</h5>
                                                            <div class="position-relative form-group">
                                                                <div>
                                                                    <div class="flex">
                                                                        {{--                                        <h2 style="text-align: center;">Toolbox</h2>--}}
                                                                        <div>
                                                                            {{--                                            <button type="button" class="btn btn-outline-dark" onclick="addText()">Add Text</button>--}}
                                                                            <button type="button" class="btn btn-outline-dark" onclick="addRect()">Add Rectangle</button>
                                                                            <button type="button" class="btn btn-outline-dark" onclick="addCircle()">Add Circle</button>
                                                                            <button type="button" class="btn btn-outline-dark" onclick="addTriangle()">Add Triangle</button>
                                                                            <button type="button" class="btn btn-outline-dark" onclick="addLine()">Add Line</button>
                                                                            {{--                                            <button type="button" class="btn btn-outline-dark" onclick="addImage(this)">Add Image</button>--}}
                                                                            {{--                                            <button type="button" class="btn btn-danger" onclick="remove()">Remove</button>--}}
                                                                        </div>
                                                                        <div style="display: none;" class="property-box">
                                                                            <div class="colorbox-container" >
                                                                                {{--<md-color-menu color="main.color">
                                                                                    <div class="colorbox" ng-style="getStyle()">
                                                                                    </div>
                                                                                </md-color-menu>--}}
                                                                                {{--                                                <input type="text" id="colorpicker" name="color" class="picker" onblur="getStyle()" value="#e0e0e0"/>--}}
                                                                                <div class="form-group">
                                                                                    <br/>
                                                                                    {{--                                                    <input type="text" style="width: 200px;" class="form-control" id="colorpicker-input" name="color" class="picker" value="rgb(255, 128, 0)"/>--}}
                                                                                </div>
                                                                                {{--                                                <span>Fill: {{main.activeObject.fill}}</span>--}}
                                                                            </div>
                                                                            <div>
                                                                                {{--<md-slider-container>
                                                                                    <span>Opacity</span>
                                                                                    <md-slider
                                --}}{{--                                                        ng-model="main.opacity"--}}{{--
                                                                                        onchange="setOpacity()"
                                                                                        min="0"
                                                                                        max="100"
                                                                                        step="1"
                                                                                        class="md-primary">
                                                                                    </md-slider>
                                                                                    <md-input-container>
                                                                                        <input
                                --}}{{--                                                            ng-model="main.opacity"--}}{{--
                                                                                            onchange="setOpacity()" />
                                                                                    </md-input-container>
                                                                                </md-slider-container>--}}
                                                                            </div>
                                                                            {{--<div layout="row">
                                                                                <button type="button" class="btn btn-outline-dark btn-sm" onclick="fnBringForward()"
                                                                                        data-toggle="tooltip" data-placement="top" title="Bring forward"
                                                                                >↑
                                                                                </button>
                                                                                <button type="button" class="btn btn-outline-dark btn-sm" onclick="fnBringToFront()"
                                                                                        data-toggle="tooltip" data-placement="top" title="Bring to front"
                                                                                >⇑
                                                                                </button>
                                                                                <button type="button" class="btn btn-outline-dark btn-sm" onclick="fnSendBackwards()"
                                                                                        data-toggle="tooltip" data-placement="top" title="Send backwards"
                                                                                >↓
                                                                                </button>
                                                                                <button type="button" class="btn btn-outline-dark btn-sm" onclick="fnSendToBack()"
                                                                                        data-toggle="tooltip" data-placement="top" title="Send to back"
                                                                                >⇓
                                                                                </button>
                                                                            </div>--}}
                                                                        </div>
                                                                        <div ng-show="activeObject.type === 'i-text'" class="property-box">
                                                                            {{--<div>
                                          <span>Font size: {{ main.getFontSize() }}
                                          </span><br />
                                                                                <span>Font family: {{main.activeObject.fontFamily}}
                                          </span><br />
                                                                                <span>Text align: {{main.activeObject.textAlign}}
                                          </span><br />
                                                                            </div>--}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="main-card mb-3 card">
                                                        <div class="card-body"><h5 class="card-title">Dra<span style="background: #f19240">win</span>g</h5>
                                                            <div class="position-relative form-group">
                                                                <div>
                                                                    {{--                                    <div class="preview-uploaded-image"></div>--}}
                                                                    <div id="canvas-container">
                                                                        <canvas id="canvas-data-container">
                                                                            <p>Unfortunately, your browser is currently unsupported by our web
                                                                                application.  We are sorry for the inconvenience. Please use one of the
                                                                                supported browsers listed below, or draw the image you want using an
                                                                                offline tool.</p>
                                                                            <p>Supported browsers: <a href="http://www.opera.com">Opera</a>, <a
                                                                                        href="http://www.mozilla.com">Firefox</a>, <a
                                                                                        href="http://www.apple.com/safari">Safari</a>, and <a
                                                                                        href="http://www.konqueror.org">Konqueror</a>.</p>
                                                                        </canvas>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="main-card mb-3 card">
                                                        <a href="#" class="btn btn-outline-success" id="btnSaveCanvasImage">Save</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /# column -->
                    </div>
                    @include('tenant.user.includes.footer')
                </section>
            </div>
        </div>
    </div>
    <div id="search">
        <button type="button" class="close">×</button>
        <form>
            <input type="search" value="" placeholder="type keyword(s) here" />
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
@endsection
@section('footer')
{{--    <script src="{{ asset('assets/tenant/customize/jquery.form.min.js') }}"></script>--}}
    <script src="{{ asset('assets/tenant/customize/fabric-3.4.0.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/tenant/customize/canvas-drawing.js') }}"></script>
    <script>
        //        $(document).ready(function () {
//        $("body").on("click","#upload_drawing",function(e){
        $("body").on("click","#upload_drawing",function(e){
            $.ajax({
                url:'{{ route('user.upload-drawing') }}',
                data:new FormData($("#upload_file")[0]),
                dataType:'json',
                async:false,
                type:'post',
                processData: false,
                contentType: false,
                success:function(response) {
                    if (response.url != undefined) {
                        // $('.preview-uploaded-image').html('<img width="620" src="'+response.responseJSON.url+'">');
                        let imagePath = '{{ url('/') }}/'+ response.url;
                        // initCanvasOnImageUpload(imagePath);
                        // addImage(20,20,0.50, imagePath);
                        initCanvasOnUpload(imagePath)
                    } else {
                        var msg = response;
                        $(".error-msg").find("ul").html('');
                        $(".error-msg").css('display','block');
                        $.each( msg, function( key, value ) {
                            $(".error-msg").find("ul").append('<li>'+value+'</li>');
                        });
                    }
                },
            });
            /*$("#upload_file").ajaxForm({
                complete: function(response)
                {
                    // if ($.isEmptyObject(response.responseJSON.image)) {
                    if (response.responseJSON.url != undefined) {
                        // $('.preview-uploaded-image').html('<img width="620" src="'+response.responseJSON.url+'">');
                        let imagePath = '{{ url('/') }}/'+ response.responseJSON.url;
                        // initCanvasOnImageUpload(imagePath);
                        // addImage(20,20,0.50, imagePath);
                        initCanvasOnUpload(imagePath)
                    } else {
                        var msg = response.responseJSON;
                        $(".error-msg").find("ul").html('');
                        $(".error-msg").css('display','block');
                        $.each( msg, function( key, value ) {
                            $(".error-msg").find("ul").append('<li>'+value+'</li>');
                        });
                    }
                }
            });*/
        });
        //        });
    </script>
@endsection
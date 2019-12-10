@extends('tenant.layouts.app')
@section('header')
    <link href="{{ asset('/public/css/component-chosen.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div class="content-wrap">
        <div class="main">

            <div class="container-fluid">
                <div class="row">

                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Profile</h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    {{--<li class="breadcrumb-item"><a href="{{ route('vendor.bids-requirement') }}">Post requirement</a></li>--}}
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <section id="main-content">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <!-- <div class="card-title">
                                            <h4>Place bid</h4>
                                        </div> -->
                                        <div class="card-body">
                                            @include('tenant.admin.includes.validation-messages')
                                            <div class="form-group">
                                                <form id="img_upload" action="{{route('customer.upload-profile-img')}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    @if(isset(auth()->user()->profile_img))
                                                    <img id="upfile1" src="{{asset('public/img/userprofile/'.auth()->user()->profile_img)}}" name="image" style="height: 100px;width: 100px" >
                                                    @else
                                                        <img src="{{ url('/') }}/public/img/user.png" style="height: 100px;width: 100px" id="upfile1" class="profile-img" >
                                                    @endif
                                                    <input id="file1" type="file" name="attachment" style="display: none;" />
                                                </form>
                                            </div>
                                            <div class="basic-form">
                                                <form method="POST" action="{{ route('customer.dashboard-profile-update') }}" enctype="multipart/form-data" id="updateProfile">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="name">Name<sup class="text-danger">*</sup></label>
                                                        <input id="name" type="text" name="name" value="{{ old('name', $user->name)}}" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Email<sup class="text-danger">*</sup></label>
                                                        <input readonly type="email" id="email" name="email" class="form-control " value="{{ old('email', $user->email) }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="phone">Phone</label>
                                                        <input id="phone" type="text" name="phone" value="{{ old('phone', $user->phone) }}" class="form-control ">
                                                    </div>

                                                    <div class="form-group row mb-0">
                                                        <button type="submit" onclick="return submitBid()" class="btn btn-primary btn-block">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /# column -->
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <script src="{{ asset('/public/js/chosen.jquery.min.js') }}" ></script>
    <script>
        $("#file1").change(function(){
            readURL(this);
            var form = document.getElementById('img_upload');
            $.ajax({
                url: $('#img_upload').attr('action'),
                type: "POST",
                data:  new FormData(form),
                contentType: false,
                cache: false,
                processData:false,
                success: function(data) {
                },
                error: function(json){

                }
            });
        });

        $('.form-control-chosen').chosen({
            allow_single_deselect: true,
            width: '100%'
        });
        function submitBid() {
            $('#place_bid').submit();

        }
    </script>
@endsection
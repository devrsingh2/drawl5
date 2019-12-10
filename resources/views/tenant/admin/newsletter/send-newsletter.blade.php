@extends('tenant.admin.layouts.app')
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
                                <h1>Send Newsletter</h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('newsletter.list') }}">List Newsletter</a></li>
                                    <li class="breadcrumb-item active">Send Newsletter</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-title">
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        @include('tenant.admin.includes.validation-messages')
                                        <form method="POST" action="{{ route('newsletter.send-newsletter') }}" enctype='multipart/form-data' id="sendnewsletters">
                                            @csrf
                                            <input type="hidden" name="newsletter_id" value="{{$newsletter->id}}">
                                            <div class="form-group">
                                                <label for="newsletter">Newsletter</label>
                                                <input id="newsletter" readonly="readonly" type="text" name="newsletter" value="{{ $newsletter->title }}"  autofocus="autofocus" class="form-control ">
                                            </div>
                                            <div class="form-group">
                                                <label for="subscriber">Subscribers</label>
                                                <textarea id="subscriber" type="text" name="subscriber"  class="form-control ">{!! $users !!}</textarea>
                                            </div>

                                            <div class="form-group row mb-0">
                                                <button type="submit" class="btn btn-primary btn-block" onclick="return onSubmit()">Send</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /# column -->
                    </div>
                </section>
            </div>
        </div>
    </div>
    <script>
        function onSubmit() {
            $('#sendnewsletters').submit();
        }
    </script>

@endsection

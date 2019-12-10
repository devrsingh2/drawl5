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
                                <h1>Create Testimonial</h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('testimonial.list') }}">List Testimonial</a></li>
                                    <li class="breadcrumb-item active">Create Testimonial</li>
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
                                        <form method="POST" action="{{ route('testimonial.store') }}" enctype='multipart/form-data' id="createTestimonail">
                                            @csrf
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input id="title" type="text" name="title" value="{{ old('title') }}"  autofocus="autofocus" class="form-control ">
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea id="description" type="text" name="description" value="{{ old('description') }}" class="form-control "></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="image">Image</label>
                                                <input id="image" type="file" name="image" value="{{ old('image') }}"  autofocus="autofocus" class="form-control ">
                                            </div>
                                            <div class="form-group row mb-0">
                                                <button type="submit" class="btn btn-primary btn-block" onclick="return onSubmit()">Add</button>
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
    function onSubmit(){
        $('#createTestimonail').submit();
    }
</script>
@endsection

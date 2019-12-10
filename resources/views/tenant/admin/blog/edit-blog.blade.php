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
                                <h1>Edit Blog</h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('blog.list') }}">List Blog</a></li>
                                    <li class="breadcrumb-item active">Edit Blog</li>
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
                                        <form method="POST" action="{{ route('blog.update') }}" enctype='multipart/form-data'>
                                            @csrf
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input id="title" type="text" name="title" value="{{ old('title', $blog->title) }}" autofocus="autofocus" class="form-control ">
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea id="description" type="text" name="description"  class="form-control ">{{ old('description', $blog->description) }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="image">Image</label>
                                                <input id="image" type="file" name="image" value="{{ old('image',$blog->image) }}"  autofocus="autofocus" class="form-control ">
                                                <img style="height:100px;width:100px" src="{{asset('public/img/blog/'.$blog->image)}}">
                                            </div>
                                            <input type="hidden" name="edit_id" value="{{ $blog->id }}">
                                            <div class="form-group row mb-0">
                                                <button type="submit" class="btn btn-primary btn-block"><i class="ti-save"></i> Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /# column -->
                    </div>
                    @include('tenant.admin.includes.footer')
                </section>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <script src="{{ asset('/public/js/chosen.jquery.min.js') }}" ></script>
    <script>
        $('.form-control-chosen').chosen({
            allow_single_deselect: true,
            width: '100%'
        });

    </script>
@endsection
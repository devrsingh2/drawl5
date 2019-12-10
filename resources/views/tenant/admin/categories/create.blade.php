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
                                <h1>Create Category</h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('categories.list') }}">Categories</a></li>
                                    <li class="breadcrumb-item active">New Category</li>
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
                                    <h4>Create Category</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        @include('tenant.admin.includes.validation-messages')
                                        <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data" id="createCategory">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input id="name" type="text" name="name" value="{{ old('name') }}" autocomplete="name" autofocus="autofocus" class="form-control ">
                                            </div>
                                            <div class="form-group">
                                                <label for="image">Image</label>
                                                <input id="image" type="file" name="image" value="{{ old('image') }}"  autofocus="autofocus" class="form-control ">
                                            </div>
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select name="status" class="form-control">
                                                    <option value="">Select Role</option>
                                                    <option value="1" {{ (old("status") == 1 ? "selected":"") }}>Active</option>
                                                    <option value="0" {{ (old("status") == 0 ? "selected":"") }}>InActive</option>
                                                </select>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <button type="submit" class="btn btn-primary btn-block" onclick="onSubmit()">+ Add</button>
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
    <div id="search">
        <button type="button" class="close">×</button>
        <form>
            <input type="search" value="" placeholder="type keyword(s) here" />
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
    <script>
        function onSubmit(){
            $('#createCategory').submit();
        }
    </script>
@endsection
@section('footer')
    <script src="{{ asset('/public/js/chosen.jquery.min.js') }}" ></script>
    <script>
        /*$('.form-control-chosen').chosen({
            allow_single_deselect: true,
            width: '100%'
        });*/
        $('#checkall').on('click',function(){
            if(this.checked){
                $('.check_list').each(function(){
                    this.checked = true;
                });
            }else{
                $('.check_list').each(function(){
                    this.checked = false;
                });
            }
        });

        $('.check_list').on('click',function(){
            if($('.check_list:checked').length == $('.check_list').length){
                $('#checkall').prop('checked',true);
            }else{
                $('#checkall').prop('checked',false);
            }
        });
    </script>
@endsection
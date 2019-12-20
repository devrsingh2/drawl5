@extends('tenant.admin.layouts.app')

@section('content')
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>List of vendors</h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/admin/vendor') }}">Vendor</a></li>
                                    <li class="breadcrumb-item active">List</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-title">
                                    <h4>Vendor Register Form</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form method="PUT" action="{{ url('/vendor') }}">
                                            @csrf 
                                            <input name='role' value='3' type='hidden'>
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input id="name" type="text" name="name" value="{{ $vendor->name }}" required="required" autocomplete="name" autofocus="autofocus" class="form-control ">
                                            </div> 
                                            <div class="form-group">
                                                <label for="email">E-Mail Address</label> 
                                                <input id="email" type="email" name="email" value="{{ $vendor->email }}" required="required" autocomplete="email" class="form-control ">
                                            </div> 
                                            <div class="form-group">
                                                <label for="password">Password</label> 
                                                <input id="password" type="password" name="password" required="required" autocomplete="new-password" class="form-control ">
                                            </div> 
                                            <div class="form-group">
                                                <label>Select Categories</label>
                                                <div class="col-sm-10">
                                                    <select name="categories" multiple="" class="form-control multiselect-categories">
                                                        @foreach($categories as $category)
                                                            <option value='{{$category->id}}'>{{$category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <button type="submit" class="btn btn-primary btn-block">Register</button>
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
@endsection

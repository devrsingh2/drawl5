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
                                <h1>Create Admin</h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.list') }}">List Admin</a></li>
                                    <li class="breadcrumb-item active">Create Admin</li>
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
                                    <h4>Create Admin</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        @include('tenant.admin.includes.validation-messages')
                                        <form method="POST" action="{{ route('admin.store') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input id="name" type="text" name="name" value="{{ old('name') }}" autocomplete="name" autofocus="autofocus" class="form-control ">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">E-Mail Address</label>
                                                <input id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="email" class="form-control ">
                                            </div>
                                            <div class="form-group">
                                                <label for="phone">Phone</label>
                                                <input id="phone" type="text" name="phone" value="{{ old('phone') }}" required="required" autocomplete="phone" class="form-control ">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input id="password" type="password" name="password" autocomplete="new-password" class="form-control ">
                                            </div>
                                            <div class="form-group">
                                                <label for="password-confirm">Confirm Password</label>
                                                <input id="password-confirm" type="password" name="password_confirmation" autocomplete="new-password" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="role">Role</label>
                                                <select name="role" class="form-control form-control-chosen" data-placeholder="Please select role">
                                                    {{--<option disabled="" value="">Select Role</option>--}}
                                                    <option value="">Select Role</option>
                                                    @if(isset($roles))
                                                        @foreach($roles as $key => $item)
                                                            <option value="{{ $item->id }}" {{ (collect(old('role'))->contains($item->id)) ? 'selected':'' }} >{{ $item->name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
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
@section('footer')
    <script src="{{ asset('/public/js/chosen.jquery.min.js') }}" ></script>
    <script>
        $('.form-control-chosen').chosen({
            allow_single_deselect: true,
            width: '100%'
        });

    </script>
@endsection
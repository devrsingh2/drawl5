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
                                <h2>Change Password</h2>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('vendor.home') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Settings</li>
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
{{--
                                    <h4>Profile</h4>
--}}
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        @include('tenant.vendors.includes.validation-messages')
                                        <form method="post" action="{{ route('customer.update-setting') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name">Current Password</label>
                                                <input id="current_password" type="password" name="current_password" autocomplete="name" autofocus="autofocus" class="form-control ">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">New Password</label>
                                                <input id="new_password" type="password" name="new_password" autocomplete="new-password" class="form-control ">
                                            </div>
                                            <div class="form-group">
                                                <label for="password_confirmation">Confirm Password</label>
                                                <input id="password_confirmation" type="password" name="password_confirmation" autocomplete="password_confirmation" class="form-control">
                                            </div>
                                            <div class="form-group row mb-0">
                                                <button type="submit" class="btn btn-primary btn-block">Save</button>
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

@endsection
@section('footer')
@endsection
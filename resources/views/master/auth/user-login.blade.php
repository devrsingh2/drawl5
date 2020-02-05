@php
    $pagetitle = 'Login';
    $page_sub_title = '';
@endphp
@extends('tenant.layouts.master')
@section('title')
    Login
@endsection
@section('header')
    <style>
        .sec-title h2 {
            font-size: 2rem;
            font-weight: 600;
            text-transform: none;
            font-family: robot-slab;
        }
        .sec-title p {
            font-size: 14px;
        }
        body {
            background: #f4f4f4;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 0.85rem;
            overflow-x: hidden;
        }
        /* ===================================== Header Style  ================================== */
        .login-box {
            padding: 20px;
            background-color: #FFF;
            float: inherit;
            margin: auto;
            margin-top: 3%;
            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
            border-radius: 4px;
        }
        .login-box .title-box {
            padding: 10px;
            background-color: #4527a0;
            box-shadow: 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
            border-radius: 2px;
            margin-top: -38px;
            text-align: center;
            color: #FFF;
            border-radius: 4px;
            margin-bottom: 40px;
        }
        .login-box .title-box h2 {
            font-size: 28px;
            color: #ffffff;
            margin-bottom: 0px;
        }
        .login-box .title-box p {
            color: #ffffff;
            font-size: 12px;
        }
        .login-box .row {
            margin: 0px;
            margin-top: 35px;
        }
        .login-box .row input {
            height: 35px;
            border: 0px;
            border-bottom: 1px solid #CCC;
        }
        .login-box .row label {
            margin-top: 7px;
            margin-left: 9px;
            float: left;
        }
        .login-box .row input[type=checkbox] {
            float: left;
        }
        .login-box .chk-lab {
            margin-top: 40px;
        }
        .login-box .chk-lab .colkd {
            padding-top: 7px;
            text-align: right;
        }
        .login-box .chk-lab .colkd a {
            color: #4527a0;
            font-size: 13px;
        }
        .login-box .submit-row {
            text-align: center;
            margin-top: 10px;
        }
        .login-box .submit-row .btn-sm {
            margin-bottom: -55px;
            box-shadow: 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
            border-radius: 2px;
            width: 160px;
            background-color: #4527a0;
            border-color: #4527a0;
        }
        .form-control:focus {
            color: #495057;
            background-color: #fff;
            border-color: #80bdff;
            outline: 0;
            box-shadow: none !important;
            border-bottom: 2px solid #4527a0 !important;
        }
    </style>
@endsection
@section('content')
    @include('tenant.includes.breadcrumb')
    <div class="container">
        <div class="row">
            <div class="col-sm-6 login-box">
                <div class="title-box">
                    <h2>{{ __('Login') }}</h2>
                    <p>Please enter  your Login details !</p>
                </div>
                <form method="POST" action="{{ route('admin.login.post-user-login') }}">
                    @csrf
                    <div class="row">
{{--                        <input type="text" placeholder="Enter Email/Username" class="form-control inpt-sm">--}}
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Email/Username" autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="row">
{{--                        <input type="text" placeholder="Enter Password" class="form-control inpt-sm">--}}
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter Password" autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="row chk-lab">
                        <div class="col-sm-6">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> <label for="remember">Remember me</label>
                        </div>
                        <div class="col-sm-6 colkd">
                            <a href="{{ route('password.email') }}">Forget Password ?</a>
                        </div>
                    </div>
                    <div class="submit-row ">
                        Do not have an account? <a href="{{ route('register') }}">Create a new one</a>
                    </div>
                    <div class=" submit-row">
                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-paper-plane"></i> Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--<section class="Material-contact-section section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 wow fadeInUp animated animated">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-common">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>--}}
@endsection
@section('footer')
@endsection
@extends('master.layouts.admin')

@section('title', 'Create Domain')

@section('content')

    @if(isset($user))
        <div class="form-group no-margin mb-2 text-right">
            <a href="{{ route('admin.home') }}" class="btn btn-outline-danger">
                &laquo; Cancel
            </a>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Registration</h4>
            {{--<form method="post" action="{{ route('admin.domain.submit') }}">--}}
            <form method="post" action="{{ route('admin.domain.submit') }}">
                {{ csrf_field() }}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group">
                    <label for="name">Company Name</label>
                    <input id="name" name="name" value="{{ old('name') }}" type="text" class="form-control" placeholder='Xyz Inc.' required autofocus>
                </div>
                <div class="form-group">
                    <label for="fqdn">Domain</label>
                    <div class="input-group">
                        <input id="fqdn" name="fqdn" value="{{ old('fqdn') }}" type="text" class="form-control" placeholder="xyz" aria-label="Comapny domain" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">.{{ config('app.domain') }}</span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">E-Mail</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" class="form-control" placeholder="xyz@example.com" required>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="password">Password
                        </label>
                        <input id="password" name="password" type="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password_confirmation">Confirm Password
                        </label>
                        <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password" required>
                    </div>
                </div>

                <div class="form-group no-margin">
                    <button type="submit" class="btn btn-primary btn-block">
                        Create New Domain
                    </button>
                </div>
                {{--<div class="text-center mt-3 small">
                    Already have an account? <a href="{{ route('app.login') }}">Login here</a>
                </div>--}}
            </form>
        </div>
    </div>

@endsection
@extends('master.layouts.app')
@section('title', 'Control Panel Login')
@section('content')
    <style>
        #frm_login.form-control {
            width: 100% !important;
            margin-bottom: 5px !important;
            padding: 8px 12px !important;
            border: 1px solid #dbdbdb !important;
            box-sizing: border-box !important;
            border-radius: 3px !important;
        }
        .overlap-text {
            position: relative;
        }

        .overlap-text a {
            position: absolute;
            top: 10px;
            right: 10px;
            color: #003569;
            font-size: 14px;
            text-decoration: none;
            font-family: 'Overpass Mono', monospace;
            letter-spacing: -1px;
        }
    </style>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Authentication</h4>
            <form id="frm_login" method="post" action="{{ route('admin.login.post') }}">
                {{ csrf_field() }}
                @if(isset($errors) && count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group">
                    <label for="email">E-Mail</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}"  type="email" class="form-control" name="email" placeholder="abc@example.com" autofocus>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    {{--<input id="password" name="password" type="password" class="form-control" name="password" placeholder="******" />--}}
                    <div class="overlap-text">
                        <input id="password" name="password" type="password" class="form-control" name="password" placeholder="******" />
                        <a href="{{ route('admin.forgot-password') }}">Forgot?</a>
                    </div>
                </div>

                <div class="form-group">
                    <label>
                        <input type="checkbox" name="is_remember" value="1"> Remember me
                    </label>
                </div>

                <div class="form-group no-margin">
                    <button type="submit" class="btn btn-primary btn-block">
                        Login
                    </button>
                </div>
                <div class="text-center mt-3 small">
                    Do not have an account? <a href="{{ route('admin.signup') }}">Create a new one</a>
                </div>
            </form>
        </div>
    </div>

@endsection
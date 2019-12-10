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
            <h4 class="card-title">Sign up for your account</h4>
            <p>
                By signing up, you confirm that you’ve read
                and accepted our User Notice and Privacy Policy.
            </p>
            {{--@if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif--}}
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
                    <label for="name">Name</label>
                    <input id="name" name="name" type="text" value="{{ old('name') }}" class="form-control" placeholder="Name" autofocus />
                </div>

                <div class="form-group">
                    <label for="email">E-Mail</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}"  class="form-control" placeholder="abc@example.com" />
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" class="form-control" placeholder="******" />
                </div>

                <div class="form-group no-margin">
                    <button type="submit" class="btn btn-primary btn-block">
                        Login
                    </button>
                </div>
                <div class="text-center mt-3 small">
                    Already have an Atlassian account? <a href="{{ route('admin.login') }}"> Log in</a>
                </div>
            </form>
        </div>
    </div>

@endsection
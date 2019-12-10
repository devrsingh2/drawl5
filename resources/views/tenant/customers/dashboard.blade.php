@extends('tenant.layouts.app')
@section('header')
    <style>
        table caption {
            padding: .5em 0;
        }

        @media screen and (max-width: 767px) {
            table caption {
                border-bottom: 1px solid #ddd;
            }
        }

        .p {
            text-align: center;
            padding-top: 140px;
            font-size: 14px;
        }
        .toggled .navbar-brand{
            opacity:0;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <h4>Welcome To Dashboard</h4>
        <hr>
        <div class="row">
            <div class="col-md-12">

            </div>
        </div>
    </div>
    <!-- page-content" -->
@endsection
@section('footer')

@endsection
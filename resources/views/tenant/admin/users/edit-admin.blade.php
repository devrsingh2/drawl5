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
                                <h1>Edit Admin</h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.list') }}">List Admin Users</a></li>
                                    <li class="breadcrumb-item active">Edit Admin</li>
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
                                    <h4>Edit Admin</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        @include('tenant.admin.includes.validation-messages')
                                        <form method="POST" action="{{ route('admin.update') }}" id="updateAdmin">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input id="name" type="text" name="name" value="{{ old('name', $item->name) }}" autocomplete="name" autofocus="autofocus" class="form-control ">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">E-Mail Address</label>
                                                <input id="email" type="email" name="email" value="{{ old('email', $item->email) }}" autocomplete="email" class="form-control ">
                                            </div>
                                            <div class="form-group">
                                                <label for="phone">Phone</label>
                                                <input id="phone" type="text" name="phone" value="{{ old('phone', $item->phone) }}" required="required" autocomplete="phone" class="form-control ">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input id="password" type="password" name="password" autocomplete="new-password" class="form-control ">
                                            </div>
                                            <div class="form-group">
                                                <label for="password-confirm">Confirm Password</label>
                                                <input id="password-confirm" type="password" name="password_confirmation" autocomplete="new-password" class="form-control">
                                            </div>
                                            <div class="form-group" >
                                                <label for="account_status">Account Status</label>
                                                <select  name="account_status" class="form-control">
                                                    <option value="">Select Account Status</option>
                                                    <option value="1" {{ (old("status", $item->account_status) == 1 ? "selected":"") }} >Active</option>
                                                    @if(auth()->user()->role != 1)
                                                    <option value="0" {{ (old("status", $item->account_status) == 0 ? "selected":"") }} >InActive</option>
                                                    <option value="2" {{ (old("status", $item->account_status) == 2 ? "selected":"") }} >Blocked</option>
                                                    @endif
                                                </select>
                                            </div>
                                            <input type="hidden" name="edit_id" value="{{ $item->id }}">
                                            <div class="form-group row mb-0">
                                                <button type="submit" class="btn btn-primary btn-block" onclick="return onSubmit()"><i class="ti-save" ></i> Update</button>
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
    <script>
        function onSubmit(){
            $('#updateAdmin').submit();
        }
    </script>
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
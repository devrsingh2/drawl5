@extends('tenant.admin.layouts.app')

@section('content')

    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Settings</h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/admin/settings') }}">Settings</a></li>
                                    <li class="breadcrumb-item active">Create/Edit</li>
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
                                    <h4>Main Information</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form method="POST" action="{{ route('settings.info') }}">
                                            @csrf
                                            <input name='role' value='3' type='hidden'>
                                            <div class="form-group">
                                                <label for="name">Site Name</label>
                                                <input id="name" type="text" name="name" value="{{ old('name', $settings->info[0]->value) }}" required="required" autocomplete="name" autofocus="autofocus" class="form-control ">
                                            </div>
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <input id="email" type="address" name="address" value="{{ old('address', $settings->info[1]->value) }}" required="required" autocomplete="address" class="form-control ">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input id="email" type="text" name="email" required="required" autocomplete="email" class="form-control" value="{{ old('email', $settings->info[2]->value) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="phone">Phone</label>
                                                <input id="phone" type="text" name="phone" required="required" autocomplete="phone" class="form-control" value="{{ old('phone', $settings->info[3]->value) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="zipcode">Zipcode</label>
                                                <input id="zipcode" type="text" name="zipcode" required="required" autocomplete="zipcode" class="form-control" value="{{ old('zipcode', $settings->info[4]->value) }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="vendor_notification">Vendor Notification</label>
                                                <select name="vendor_notification" class="form-control">
                                                    <option value="">Select Vendor Notification</option>
                                                    <option value="auto" {{ (old("vendor_notification", $settings->info[5]->value) == 'auto' ? "selected":"") }} >Auto</option>
                                                    <option value="manual" {{ (old("vendor_notification", $settings->info[5]->value) == 'manual' ? "selected":"") }} >Manual</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="token_amount">Token Amount</label>
                                                <div class="input-group">
                                                    <input id="token_amount" type="text" name="token_amount" required="required" autocomplete="token_amount" class="form-control" value="{{ old('token_amount', $settings->info[6]->value) }}">
                                                    {{--<div class="input-group-append">
                                                        <span class="input-group-text">%</span>
                                                    </div>--}}
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <button type="submit" class="btn btn-primary btn-block"><i class="ti-save"></i> Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-title">
                                    <h4>SMTP Information</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form method="POST" action="{{ route('settings.smtp') }}">
                                            @csrf
                                            <input name='role' value='3' type='hidden'>
                                            <div class="form-group">
                                                <label for="driver">Driver</label>
                                                <input id="driver" type="text" name="driver" value="{{ old('driver', $settings->smtp[0]->value) }}" required="required" autocomplete="driver" autofocus="autofocus" class="form-control ">
                                            </div>
                                            <div class="form-group">
                                                <label for="host">Host</label>
                                                <input id="host" type="text" name="host" value="{{ old('host', $settings->smtp[1]->value) }}" required="required" autocomplete="host" class="form-control ">
                                            </div>
                                            <div class="form-group">
                                                <label for="port">Port</label>
                                                <input id="port" type="text" name="port" required="required" autocomplete="port" class="form-control" value="{{ old('port', $settings->smtp[2]->value) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <input id="username" type="text" name="username" required="required" autocomplete="username" class="form-control" value="{{ old('username', $settings->smtp[3]->value) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input id="password" type="text" name="password" required="required" autocomplete="password" class="form-control" value="{{ old('password', $settings->smtp[4]->value) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="encryption">Encryption</label>
                                                <input id="encryption" type="text" name="encryption" required="required" autocomplete="encryption" class="form-control" value="{{ old('encryption', $settings->smtp[5]->value) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="address">From Address</label>
                                                <input id="address" type="text" name="address" required="required" autocomplete="address" class="form-control" value="{{ old('address', $settings->smtp[6]->value) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">From Name</label>
                                                <input id="name" type="text" name="name" required="required" autocomplete="name" class="form-control" value="{{ old('name', $settings->smtp[7]->value) }}">
                                            </div>
                                            <div class="form-group row mb-0">
                                                <button type="submit" class="btn btn-primary btn-block"><i class="ti-save"></i> Update</button>
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

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
                                    {{--<li class="breadcrumb-item"><a href="{{ url('/admin/settings') }}">Settings</a></li>--}}
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('setting.create') }}" class="btn btn-primary">+ Add</a>
                                    </li>
                                    {{--<li class="breadcrumb-item active">List</li>--}}
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
                                    <h4>Settings</h4>
                                </div>
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="row-select" class="display table table-borderd table-hover">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Verified</th>
                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            {{--@foreach($vendors as $vendor)
                                                <tr>
                                                    <td>{{ $vendor->name }}</td>
                                                    <td>{{ $vendor->email }}</td>
                                                    <td>{{ $vendor->email_verified_at }}</td>
                                                    <td>{{ $vendor->created_at }}</td>
                                                    <td>
                                                        <a href="{{ url('/admin/vendor/'.$vendor->id.'/edit') }}"><i class="ti-eye"></i></a>
                                                        <a href="{{ url('/admin/vendor/'.$vendor->id.'/destroy') }}"><i class="ti-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach--}}
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                    </div>
                    <!-- /# row -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer">
                                <p>{{ date('Y') }} © Admin Board. - <a href="#">{{ config('app.name') }}</a></p>
                            </div>
                        </div>
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

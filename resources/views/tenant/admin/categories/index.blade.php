@extends('tenant.admin.layouts.app')

@section('content')
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>List Categories</h1>
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
                                        <a href="{{ route('categories.create') }}" class="btn btn-primary">+ Add New Category</a>
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
                                    <h4>List Categories</h4>
                                </div>
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="row-select" class="display table table-borderd table-hover">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Status</th>
                                                <th>Image</th>
                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            @if(isset($items))
                                                @foreach($items as $k => $item)
                                                    <tr>
                                                        <td>{{ $item->name }}</td>
                                                        <td>
                                                            @if($item->status === 1)
                                                                <label class="btn btn-sm btn-success">Active</label>
                                                            @else
                                                                <label class="btn btn-sm btn-danger">InActive</label>
                                                            @endif
                                                        </td>
                                                        <td style="max-width: 300px"><img style="height:100px;width:100px" src="{{asset('public/img/category/'.$item->image)}}"></td>
                                                        <td>{{ $item->created_at }}</td>
                                                        <td>
                                                            <a class="btn btn-primary" href="{{ route('categories.edit', $item->id) }}"><i class="ti-pencil-alt"></i></a>
                                                            <a class="btn btn-danger" href="{{ route('categories.delete', $item->id) }}" onclick="return confirm('Do you really want to delete this category?');"><i class="ti-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
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

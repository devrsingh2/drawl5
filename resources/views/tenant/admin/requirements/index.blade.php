@extends('tenant.admin.layouts.app')

@section('content')
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>List Requirements</h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active"><a href="{{ route('requirements.list') }}">Requirements</a></li>
                                    {{--<li class="breadcrumb-item">
                                        <a href="{{ route('requirements.create') }}" class="btn btn-primary">+ Add New Requirement</a>
                                    </li>--}}
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
                                    <h4>List Requirements</h4>
                                </div>
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="row-select" class="display table table-borderd table-hover">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Product</th>
                                                <th>Bids</th>
                                                <th>Status</th>
                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            @if(isset($items))
                                                @foreach($items as $k => $item)
                                                    <tr>
                                                        <td>{{ $item->title }}</td>
                                                        <td>{{ $item->category->name }}</td>
                                                        <td>@if(isset($item->product)){{ $item->product->name }}@else NA @endif</td>
                                                        <td>{{ $item->bids->count() }}</td>
                                                        <td>
                                                            @if($item->active === 1)
                                                                <label class="btn btn-sm btn-success">Active</label>
                                                            @else
                                                                <label class="btn btn-sm btn-danger">InActive</label>
                                                            @endif
                                                        </td>
                                                        <td>{{ $item->created_at }}</td>
                                                        <td>
                                                            @if (\App\Setting::find(6)->value === 'manual')
                                                            <a class="btn btn-primary" href="{{ route('requirements.list-wholesalers', $item->id) }}"><i class="ti-book"></i></a>
                                                            @else
                                                                --
                                                            @endif
                                                            {{--<a class="btn btn-danger" href="{{ route('requirements.delete', $item->id) }}" onclick="return confirm('Do you really want to delete this requirement?');"><i class="ti-trash"></i></a>--}}
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
                    @include('tenant.admin.includes.footer')

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

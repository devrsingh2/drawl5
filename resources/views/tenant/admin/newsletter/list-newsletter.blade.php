@extends('tenant.admin.layouts.app')

@section('content')
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>List Newsletter</h1>
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
                                        <a href="{{ route('newsletter.create') }}" class="btn btn-primary">+ Add Newsletter</a>
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

                                </div>
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="row-select" class="display table table-borderd table-hover">
                                            <thead>
                                            <tr>
                                                <th>Sr No</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Content</th>
                                                <th>Created_by</th>
                                                <th>Send</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            @if(isset($newsletters))
                                                @foreach($newsletters as $k => $newsletter)
                                                    <tr>
                                                        <td>{{ $newsletter->id }}</td>
                                                        <td>{{ $newsletter->title }}</td>
                                                        <td style="max-width: 300px">{{ $newsletter->description}}</td>
                                                        <td style="max-width: 300px">{!! $newsletter->content !!}</td>
                                                        <td>{{ $newsletter->User->name}}</td>
                                                        <td><a class="btn btn-success" href="{{ route('newsletter.select-user', $newsletter->id) }}"><i class="ti-arrow-right"></i></a></td>
                                                        <td>
                                                            <a class="btn btn-primary" href="{{ route('newsletter.edit', $newsletter->id) }}"><i class="ti-eye"></i></a>
                                                            <a class="btn btn-danger" href="{{ route('newsletter.delete', $newsletter->id) }}" onclick="return confirm('Do you really want to delete this question?');"><i class="ti-trash"></i></a>

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

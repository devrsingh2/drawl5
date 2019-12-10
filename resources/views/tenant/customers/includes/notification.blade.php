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
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h2>Notifications</h2>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->

                </div>
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                 <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="row-select" class="display table table-borderd table-hover">
                                            <thead>
                                            <tr>
                                                <th>Vendor</th>
                                                <th>Subject</th>
                                                <th>Requirement</th>
                                                <th>Category</th>
                                                <th>Description</th>

                                            </tr>
                                            </thead>
                                            @if(isset($all_notification))
                                                @foreach($all_notification as $notification)
                                                    <tr>
                                                        <td>{{ $notification->fromUser->name }}</td>
                                                        <td>{{ $notification->subject }}</td>
                                                        <td>{{ $notification->requirement->title }}</td>
                                                        <td>{{ $notification->category->name }}</td>
                                                        <td>
                                                            {!! $notification->message !!}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            <tfoot>
                                            <tr>
                                                <td colspan="6" class="text-right">
                                                    <div class="table-footer">
                                                        <div class="count"><i class="fa fa-folder"></i> {{ $all_notification->total() }} Item(s)</div>
                                                        <div class="pagination-area"> {!! $all_notification->render() !!} </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                    </div>
                    <!-- /# row -->


                </section>
            </div>
        </div>
    </div>

@endsection

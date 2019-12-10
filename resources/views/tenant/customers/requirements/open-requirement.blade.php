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
        <h2>Open Requirement</h2>
        <hr>
        <div class="row">
            <div class="col-md-12">

                @if(isset($items) && count($items) > 0)
                    <div class="table-responsive">
                        <table summary="This table shows how to create responsive tables using Bootstrap's default functionality" class="table table-bordered table-hover">
                            {{--<caption class="text-center">An example of a responsive table based on <a href="https://getbootstrap.com/css/#tables-responsive" target="_blank">Bootstrap</a>:</caption>--}}
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Quantity</th>
                                <th>Attachment</th>
                                <th>Posted</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $k => $item)
                                <tr>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->category->name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>
                                        @if($item->requirementAdditional)
                                        @if($item->requirementAdditional->attachment)
                                            <a href="{{ url('/') }}/public/img/requirements/{{ $item->requirementAdditional->attachment }}"
                                               target="_blank">
                                                {{ $item->requirementAdditional->attachment }}
                                            </a>
                                        @endif
                                        @else
                                            --
                                        @endif
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <a href="{{ route('customer.requirement-detail', [$item->id]) }}" class="btn btn-sm btn-success">View</a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="6" class="text-right">
                                    <div class="table-footer">
                                        <div class="count"><i class="fa fa-folder"></i> {{ $items->total() }} Item(s)</div>
                                        <div class="pagination-area"> {!! $items->render() !!} </div>
                                    </div>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div><!--end of .table-responsive-->
                @else
                    <div class="alert alert-danger text-center">
                        No Open Requirements
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- page-content" -->
@endsection
@section('footer')

@endsection
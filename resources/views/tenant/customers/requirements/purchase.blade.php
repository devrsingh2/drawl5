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
        <h2>Purchase</h2>
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
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $k => $item)
                                <tr>
                                    <td>@if(isset($item->requirement)){{ $item->requirement->title }}@else - @endif</td>
                                    <td>{{isset($item->requirement->category)?$item->requirement->category->name:"-" }}</td>
                                    <td>@if(isset($item->requirement)){{ $item->requirement->quantity }}@else - @endif</td>
                                    <td>
                                        @if(isset($item->requirement->requirementAdditional))
                                            <a href="{{ url('/') }}/public/img/requirements/{{ $item->requirement->requirementAdditional->attachment }}"
                                               target="_blank">
                                                {{ $item->requirement->requirementAdditional->attachment }}
                                            </a>
                                        @else
                                            --
                                        @endif
                                    </td>
                                    <td>{{ $item->created_at }}</td>
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
                        No Purchase
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- page-content" -->
@endsection
@section('footer')

@endsection
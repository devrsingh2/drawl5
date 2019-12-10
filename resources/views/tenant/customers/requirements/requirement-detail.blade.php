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
        <h2>{{ $requirement->title }}</h2>
        <hr>
        <div class="row">
            <div class="col-md-12">
                @if(isset($requirement->bids) && count($requirement->bids) > 0)
                    <div class="table-responsive">
                        <table summary="This table shows how to create responsive tables using Bootstrap's default functionality" class="table table-bordered table-hover">
                            {{--<caption class="text-center">An example of a responsive table based on <a href="https://getbootstrap.com/css/#tables-responsive" target="_blank">Bootstrap</a>:</caption>--}}
                            <thead>
                            <tr>
                                <th>Vendor</th>
                                <th>Requirement</th>
                                <th>Bid Desc.</th>
                                <th>Amount</th>
                                <th>Bidded At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($requirement->bids as $k => $item)
                                <tr>
                                    <td>{{ $item->User->name }}</td>
                                    <td>{{ $item->requirement->title }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->amount }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        @if($item->status == 'pending' && $item->count() > 0)
                                            <a href="{{ route('customer.accept-bid', [$item->requirement->id, $item->id]) }}" class="btn btn-sm btn-success" onclick="return confirm('Do you really want to accept this bid?');">Accept</a>
                                            <a href="{{ route('customer.reject-bid', [$item->requirement->id, $item->id]) }}" class="btn btn-sm btn-danger" onclick="return confirm('Do you really want to reject this bid?');">Reject</a>
                                        @elseif($item->status == 'accepted')
                                            <label class="btn btn-sm btn-success">Accepted</label>
                                        @else
                                            <label class="btn btn-sm btn-warning">{{ ucfirst($item->status) }}</label>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div><!--end of .table-responsive-->
                @else
                    <div class="alert alert-danger text-center">
                        No Bid Placed
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- page-content" -->
@endsection
@section('footer')

@endsection
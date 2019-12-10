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
        <h2>Bids</h2>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table summary="This table shows how to create responsive tables using Bootstrap's default functionality" class="table table-bordered table-hover">
                        {{--<caption class="text-center">An example of a responsive table based on <a href="https://getbootstrap.com/css/#tables-responsive" target="_blank">Bootstrap</a>:</caption>--}}
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Requirement</th>
                            <th>Price</th>
                            <th>Attachment</th>
                            <th>Posted</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @if(isset($bids))
                            @foreach($bids as $k => $item)

                                <tr>
                                    <td>{{ $item->User->name }}</td>
                                    <td>{{ $item->requirement->title}}</td>
                                    <td>{{ $item->amount }}</td>
                                    <td>
                                        @if($item->bidAdditional)
                                            <a href="{{ url('/') }}/public/img/vendorbid/{{ $item->bidAdditional->attachment }}"
                                               target="_blank">
                                                {{ $item->bidAdditional->attachment }}
                                            </a>
                                        @else
                                            --
                                        @endif
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        @if($item->status == 'pending')
                                            <a href="{{ route('customer.accept-bid', [$item->requirement_id, $item->id]) }}" class=" btn-sm btn-success" onclick="return confirm('Do you really want to accept this bid?');">Accept</a>
                                            <a href="{{ route('customer.reject-bid', [$item->requirement_id, $item->id]) }}" class="btn btn-sm btn-danger" onclick="return confirm('Do you really want to reject this bid?');">Reject</a>
                                        @elseif($item->status == 'accepted')
                                            <label class=" btn-sm btn-success">Accepted</label>
                                        @else
                                            <label class=" btn-sm btn-warning">{{ ucfirst($item->status) }}ed</label>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="5" class="text-right">
                                <div class="table-footer">
                                    <div class="count"><i class="fa fa-folder"></i> {{ $bids->total() }} Item(s)</div>
                                    <div class="pagination-area"> {!! $bids->render() !!} </div>
                                </div>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div><!--end of .table-responsive-->
            </div>
        </div>
    </div>
    <!-- page-content" -->
@endsection
@section('footer')

@endsection
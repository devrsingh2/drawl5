@extends('tenant.user.layouts.app')
@section('header')
    <link href="{{ asset('/public/css/component-chosen.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div class="content-wrap">
        <div class="main">

            <div class="container-fluid">
                <div class="row">

                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Place bid</h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    {{--<li class="breadcrumb-item"><a href="{{ route('vendor.bids-requirement') }}">Post requirement</a></li>--}}
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <section id="main-content">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <h6>Existing Bids</h6>
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="row-select" class="display table table-borderd table-hover">
                                            <thead>
                                            <tr>
                                                <th>Sr No</th>
                                                <th>Vendor name</th>
                                                <th>Price</th>
                                            </tr>
                                            </thead>

                                            @php
                                                $i=1;
                                            @endphp

                                            @if(!empty($lowest_amt_bids->all()))
                                                <tbody>
                                                @foreach($lowest_amt_bids as $lowest_amt_bid)
                                                    <tr>
                                                        <td>{{$i}}</td>
                                                        <td>{{ $lowest_amt_bid->User->name }}</td>
                                                        <td>{{ $lowest_amt_bid->amount }}</td>

                                                        @php
                                                            $i++
                                                        @endphp
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            @else
                                                <tfoot>
                                                <tr>
                                                    <td rowspan="5">
                                                        <span>No bids available</span>
                                                    </td>
                                                </tr>
                                                </tfoot>
                                            @endif
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <!-- <div class="card-title">
                                            <h4>Place bid</h4>
                                        </div> -->
                                        <div class="card-body">
                                            @include('tenant.admin.includes.validation-messages')
                                            <div class="basic-form">

                                                <form method="POST" action="{{ route('place-bid') }}" enctype="multipart/form-data" id="place_bid">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="amount">Amount<sup class="text-danger">*</sup></label>
                                                        <input id="amount" type="number" name="amount" min="1" value="{{ old('amount') }}" autocomplete="amount" class="form-control ">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="description">Description<sup class="text-danger">*</sup></label>
                                                        <textarea id="description" name="description" class="form-control ">{{ old('description') }}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="amount">Choose file</label>
                                                        <input id="attachment" type="file" name="attachment" min="1" value="{{ old('attachment') }}" autocomplete="attachment" class="form-control ">
                                                    </div>
                                                    <input type="hidden" name="requirement_id" value="{{Request::segment(3)}}">
                                                    <div class="form-group row mb-0">
                                                        <button type="submit" onclick="return submitBid()" class="btn btn-primary btn-block">Place</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /# column -->
                            </div>
                        </div>
                    </div>
                    @include('tenant.user.includes.footer')
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
@section('footer')
    <script src="{{ asset('/public/js/chosen.jquery.min.js') }}" ></script>
    <script>
        $('.form-control-chosen').chosen({
            allow_single_deselect: true,
            width: '100%'
        });
function submitBid() {
    $('#place_bid').submit();

}
    </script>
@endsection
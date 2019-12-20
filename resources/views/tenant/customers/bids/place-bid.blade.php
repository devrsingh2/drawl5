@extends('tenant.layouts.app')
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
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <!-- <div class="card-title">
                                            <h4>Place bid</h4>
                                        </div> -->
                                        <div class="card-body">
                                            @include('tenant.admin.includes.validation-messages')
                                            <div class="basic-form">

                                                <form method="POST" action="{{ route('customer.submit-bid') }}" enctype="multipart/form-data" id="place_bid">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $product_id }}" />
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
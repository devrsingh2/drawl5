@extends('tenant.admin.layouts.app')
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
                                <h1>Edit FAQ</h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('faq.list') }}">List FAQ</a></li>
                                    <li class="breadcrumb-item active">Edit FAQ</li>
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
                                <div class="card-body">
                                    <div class="basic-form">
                                        @include('tenant.admin.includes.validation-messages')
                                        <form method="POST" action="{{ route('faq.update') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name">Question</label>
                                                <input id="question" type="text" name="question" value="{{ old('question', $faq->question) }}" autofocus="autofocus" class="form-control ">
                                            </div>
                                            <div class="form-group">
                                                <label for="answer">Answer</label>
                                                <textarea id="answer" type="text" name="answer"  class="form-control ">{{ old('answer', $faq->answer) }}</textarea>
                                            </div>
                                            <input type="hidden" name="edit_id" value="{{ $faq->id }}">
                                            <div class="form-group row mb-0">
                                                <button type="submit" class="btn btn-primary btn-block"><i class="ti-save"></i> Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /# column -->
                    </div>
                    @include('tenant.admin.includes.footer')
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

    </script>
@endsection
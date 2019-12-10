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
                                <h1>Create Banner</h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('banner.list') }}">List Banner</a></li>
                                    <li class="breadcrumb-item active">Create Banner</li>
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
                                        <form method="POST" action="{{ route('banner.store') }}" enctype='multipart/form-data'>
                                            @csrf

                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input id="title" type="text" name="title" value="{{ old('title') }}"  autofocus="autofocus" class="form-control ">
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea id="description" type="text" name="description" value="{{ old('description') }}" class="form-control "></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="image">Image</label>
                                                <input id="image" type="file" name="image" value="{{ old('image') }}"  autofocus="autofocus" class="form-control ">
                                            </div>
                                            <div class="form-group row">
                                            <div class="col-lg-6">
                                            <label for="from">From</label>
                                            <input type="text" id="from" name="from"  class="form-control">
                                            </div>
                                            <div class="col-lg-6">
                                            <label for="to">To</label>
                                            <input type="text" id="to" name="to"  class="form-control">
                                            </div>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <button type="submit" class="btn btn-primary btn-block">Add</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /# column -->
                    </div>
                </section>
            </div>
        </div>
    </div>
    <script>
        $( function() {
            var dateFormat = "mm/dd/yy";
                var from = $( "#from" ).datepicker({
                        defaultDate: "+1w",
                        changeMonth: true,
                        numberOfMonths: 3
                    })
                    .on( "change", function() {
                        to.datepicker( "option", "minDate", getDate( this ) );
                    });
                var to = $( "#to" ).datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 3
                })
                    .on( "change", function() {
                        from.datepicker( "option", "maxDate", getDate( this ) );
                    });

            function getDate( element ) {
                var date;
                try {
                    date = $.datepicker.parseDate( dateFormat, element.value );
                } catch( error ) {
                    date = null;
                }

                return date;
            }
        } );




    </script>
<style>

    .ui-draggable, .ui-droppable {
    background-position: top;
    }
</style>

@endsection

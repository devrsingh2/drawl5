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
                                <h1>Create Role</h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('roles.list') }}">Roles</a></li>
                                    <li class="breadcrumb-item active">New Role</li>
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
                                    <h4>Create Role</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        @include('tenant.admin.includes.validation-messages')
                                        <form method="POST" action="{{ route('roles.store') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input id="name" type="text" name="name" value="{{ old('name') }}" autocomplete="name" autofocus="autofocus" class="form-control ">
                                            </div>
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select name="status" class="form-control">
                                                    <option value="">Select Role</option>
                                                    <option value="1" {{ (old("status") == 1 ? "selected":"") }}>Active</option>
                                                    <option value="0" {{ (old("status") == 0 ? "selected":"") }}>InActive</option>
                                                </select>
                                            </div>

                                            {{--<div class="form-group">
                                                <label for="permissions">Permissions</label>
                                                <select id="permissions" name="permissions" class="form-control form-control-chosen" data-placeholder="Please select..." multiple>
                                                    <option value="">Select Permissions</option>
                                                </select>
                                            </div>--}}
                                            <hr/>
                                            <h4><i>All Permissions</i></h4>
                                            @if(isset($permissions) && count($permissions)>0)
                                                <input type="checkbox" name="check_all" id="checkall">
                                                Select All
                                                @foreach($permissions as $key => $item)
                                                    @if($item->id == 20 || $item->id == 21)
                                                        <div class="checkbox">
                                                            <label><input name="permissions[]" checked type="checkbox" value="{{ $item->id }}" class="check_list" {{ ((old('permissions'))->contains($item->id)) ? 'checked':'' }} > {{ $item->name }}</label>
                                                        </div>
                                                    @else
                                                        <div class="checkbox">
                                                            <label><input name="permissions[]" type="checkbox" value="{{ $item->id }}" class="check_list" {{ (collect(old('permissions'))->contains($item->id)) ? 'checked':'' }} > {{ $item->name }}</label>
                                                        </div>
                                                    @endif
                                                @endforeach
                                                {{--<div class="col-md-3">--}}
                                                {{--<button type="submit" class="btn btn-block btn-primary">{{trans('Core::operations.save_changes')}}</button>--}}
                                                {{--</div>--}}
                                            @endif
                                            <hr/>

                                            <div class="form-group row mb-0">
                                                <button type="submit" class="btn btn-primary btn-block">+ Add</button>
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
        /*$('.form-control-chosen').chosen({
            allow_single_deselect: true,
            width: '100%'
        });*/
        $('#checkall').on('click',function(){
            if(this.checked){
                $('.check_list').each(function(){
                    this.checked = true;
                });
            }else{
                $('.check_list').each(function(){
                    this.checked = false;
                });
            }
        });

        $('.check_list').on('click',function(){
            if($('.check_list:checked').length == $('.check_list').length){
                $('#checkall').prop('checked',true);
            }else{
                $('#checkall').prop('checked',false);
            }
        });
    </script>
@endsection
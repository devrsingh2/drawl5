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
                                <h1>Update Role</h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('roles.list') }}">Roles</a></li>
                                    <li class="breadcrumb-item active">Update Role</li>
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
                                    <h4>Update Role</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        @include('tenant.admin.includes.validation-messages')
                                        <form method="POST" action="{{ route('roles.update') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input id="name" type="text" @if($item->id === 2) readonly @endif name="name" value="{{ old('name', $item->name) }}" autocomplete="name" autofocus="autofocus" class="form-control ">
                                                <input id="old_name" type="hidden" name="old_name" value="{{ old('name', $item->name) }}" autocomplete="name" autofocus="autofocus" class="form-control ">
                                            </div>
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select name="status" class="form-control">
                                                    <option value="">Select Role</option>
                                                    <option value="1" {{ (old("status", $item->status) == 1 ? "selected":"") }}>Active</option>
                                                    <option value="0" {{ (old("status", $item->status) == 0 ? "selected":"") }}>InActive</option>
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
                                                @foreach($permissions as $p)
                                                    @if($p->id == 20 || $p->id == 21)
                                                        <div class="checkbox">
                                                            <label><input name="permissions[]" checked type="checkbox" value="{{ $p->id }}" class="check_list" @if(isset($arr_role_permission) && count($arr_role_permission) > 0) @if(in_array($p->id,$arr_role_permission)) checked @endif  @endif> {{ $p->name }}</label>
                                                        </div>
                                                    @else
                                                        <div class="checkbox">
                                                            <label><input name="permissions[]" type="checkbox" value="{{ $p->id }}" class="check_list" @if(isset($arr_role_permission) && count($arr_role_permission) > 0) @if(in_array($p->id,$arr_role_permission)) checked @endif  @endif> {{ $p->name }}</label>
                                                        </div>
                                                    @endif
                                                @endforeach
                                                {{--<div class="col-md-3">--}}
                                                {{--<button type="submit" class="btn btn-block btn-primary">{{trans('Core::operations.save_changes')}}</button>--}}
                                                {{--</div>--}}
                                            @endif
                                            <hr/>
                                            <input type="hidden" name="edit_id" value="{{ $item->id }}">
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
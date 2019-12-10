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
                                <h1>Update Product</h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('products.list') }}">Products</a></li>
                                    <li class="breadcrumb-item active">Update Product</li>
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
                                    <h4>Update Product</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        @include('tenant.admin.includes.validation-messages')
                                        <form method="POST" action="{{ route('products.update') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input id="name" type="text" name="name" value="{{ old('name', $item->name) }}" autocomplete="name" autofocus="autofocus" class="form-control ">
                                                <input id="old_name" type="hidden" name="old_name" value="{{ old('name', $item->name) }}" autocomplete="name" autofocus="autofocus" class="form-control ">
                                            </div>
                                            {{--<div class="form-group">
                                                <label for="price">Price</label>
                                                <input id="price" type="text" name="price" value="{{ old('price', $item->price) }}" autocomplete="price" autofocus="autofocus" class="form-control ">
                                            </div>--}}
                                            @if(\App\Helpers\GeneralHelper::getCurrentTenant() === env('CLIENT1'))
                                                <div class="form-group">
                                                    <label for="min_price">Min Price</label>
                                                    <input id="price" type="text" name="min_price" value="{{ old('min_price', $item->min_price) }}" autocomplete="min_price" autofocus="autofocus" class="form-control ">
                                                </div>
                                                <div class="form-group">
                                                    <label for="max_price">Max Price</label>
                                                    <input id="max_price" type="text" name="max_price" value="{{ old('max_price', $item->max_price) }}" autocomplete="max_price" autofocus="autofocus" class="form-control ">
                                                </div>
                                            @else
                                                <div class="form-group">
                                                    <label for="price">Price</label>
                                                    <input id="price" type="text" name="price" value="{{ old('price', $item->price) }}" autocomplete="price" autofocus="autofocus" class="form-control ">
                                                </div>
                                            @endif
                                            <div class="form-group">
                                                <label for="category_id">Category</label>
                                                <select name="category_id" class="form-control">
                                                    <option value="">Select Category</option>
                                                    @if(isset($categories))
                                                        @foreach($categories as $k => $category)
                                                            <option value="{{ $category->id }}" {{ (old("category_id", $item->category_id) === $category->id ? "selected":"") }} >{{ $category->name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea name="description" class="form-control">{{ old('description', $item->description) }}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="images">Files</label>
                                                <input type="file" name="images" class="form-control" />
                                                @if (isset($item->productAdditional->attachment) && $item->productAdditional->attachment !='')
                                                    <code><img width="100" height="100" src="{{ asset('public/img/product/') }}/{{ $item->productAdditional->attachment }}"></code>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select name="status" class="form-control">
                                                    <option value="">Select Product</option>
                                                    <option value="1" {{ (old("status", $item->status) == 1 ? "selected":"") }}>Active</option>
                                                    <option value="0" {{ (old("status", $item->status) == 0 ? "selected":"") }}>InActive</option>
                                                </select>
                                            </div>

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
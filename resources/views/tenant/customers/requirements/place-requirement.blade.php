@extends('tenant.layouts.app')
@section('header')
    <style xmlns="http://www.w3.org/1999/html">
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
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-text">Post Requirement</h3>
                    </div>

                    <div class="card-body">
                        @include('tenant.includes.validation-messages')
                        <form id="frm_post_requirement" action="{{ route('post-requirement') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @php
                            $product_name = "";
                            $product_desc = "";

                            @endphp

                            @if($product->count()>0)
                                <div id="product-title" class="form-group">
                                    <label for="title">Product Title: </label>
                                    <strong><span id="product-name">"{{ $product->name }}"</span></strong>
                                </div>
                                <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
                                @php
                                    $product_name = $product->name;
                                    $product_desc = $product->description;
                                @endphp
                            @endif

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{$product_name}}" placeholder="Enter requirement title"/>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" placeholder="Enter description of requirement">{{$product_desc}}</textarea>
                            </div>
                            @if(!$product->count()>0)
                                <div id="div-category" class="form-group" >
                                    <label for="category">Category</label>
                                    @if($categories->count() == 1)
                                        <textarea type="text" class="form-control" readonly  value="{{$categories[0]->id}}" name="category" id="category" />{{$categories[0]->name}}</textarea>
                                    @else
                                    <select class="custom-select" id="category" name="category">
                                        <option value="">Select Category</option>
                                        @if(Auth::check() && Auth::user()->role==4)
                                            @if(isset($categories))
                                                @foreach($categories as $category)
                                                    <option value='{{$category->id}}'>{{$category->name}}</option>
                                                @endforeach
                                            @endif
                                        @endif
                                    </select>
                                    @endif
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input type="text" class="form-control" min="1" value="1" name="quantity" id="quantity" placeholder="Enter quantity"/>
                            </div>
                            <div class="form-group">
                                <label for="attachment">Attachment</label>
                                <input type="file" class="form-control" name="attachment" id="attachment" />
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block" id="btn_requirement_submit">SUBMIT</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- page-content" -->
@endsection
@section('footer')

@endsection
@php
    $pagetitle = '';
    $page_sub_title = isset($page_content->name) ? $page_content->name : '';
@endphp
@extends('tenant.layouts.master')
@section('title')
    {{ isset($page_content->name) ? $page_content->name : '' }}
@endsection
@section('header')

@endsection
@section('content')
    @include('tenant.includes.breadcrumb')
    <section class="Material-about-section section-padding">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <p>{!! isset($page_content->content) ? $page_content->content : '' !!}</p>
                </div>

            </div>
        </div>
    </section>
@endsection
@section('footer')
@endsection
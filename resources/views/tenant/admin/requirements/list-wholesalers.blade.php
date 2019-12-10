@extends('tenant.admin.layouts.app')

@section('content')
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>List Requirements</h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('requirements.list') }}">Requirements</a></li>
                                    <li class="breadcrumb-item active">Vendors List</li>
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
                                    <h4>List Requirements</h4>
                                </div>
                                <div class="bootstrap-data-table-panel">
                                    <form method="post" action="{{ route('requirements.send-notification', $id) }}" id="bulk" class="form-inline">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="table-responsive">
                                            <table id="row-select" class="display table table-borderd table-hover">
                                                <thead>
                                                <tr>
                                                    <th>
                                                        <input type="checkbox" name="check_all" id="checkall">
                                                    </th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Created At</th>
                                                    {{--<th>Action</th>--}}
                                                </tr>
                                                </thead>
                                                @if(isset($wholesalers))
                                                    @foreach($wholesalers as $k => $item)
                                                        <tr>
                                                            <td>
                                                                <input type="checkbox" name="ids[]" class="check_list" value="{{$item->id}}">
                                                            </td>
                                                            <td>{{ $item->name }}</td>
                                                            <td>{{ $item->email }}</td>
                                                            <td>{{ $item->phone }}</td>
                                                            <td>{{ $item->created_at }}</td>
                                                            {{--<td>
                                                                <a class="btn btn-primary" href="{{ route('requirements.send-notification', $item->id) }}"><i class="ti-bell"></i></a>
                                                            </td>--}}
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </table>
                                        </div>
                                        <hr/>
                                        <br/>
                                        <button type="submit" class="btn btn-success" id="action-btn"><i class="fa fa-bell-o"></i> Send Notification</button>
                                        <hr/>
                                        <div class="table-footer">
                                            <div class="count"><i class="fa fa-folder-o"></i> {{ $wholesalers->total() }} Items</div>
                                            <div class="pagination-area"> {!! $wholesalers->render() !!} </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                    </div>
                    <!-- /# row -->
                    @include('tenant.admin.includes.footer')

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
    <script>
        $('#action-btn').prop({ 'disabled': true});
        $('#checkall').on('click',function(){
            if(this.checked){
                $('.check_list').each(function(){
                    this.checked = true;
                });
                $('#action-btn').prop({ 'disabled': false});
            }else{
                $('#action-btn').prop({ 'disabled': true});
                $('.check_list').each(function(){
                    this.checked = false;
                });
            }
        });

        $('.check_list').on('click',function() {
            if ($('.check_list:checked').length == $('.check_list').length) {
                $('#checkall').prop('checked',true);
            } else {
                $('#checkall').prop('checked',false);
            }
            if($('.check_list:checked').length > 0) {
                $('#action-btn').prop({ 'disabled': false});
            } else {
                $('#action-btn').prop({ 'disabled': true});
            }
        });
    </script>
@endsection
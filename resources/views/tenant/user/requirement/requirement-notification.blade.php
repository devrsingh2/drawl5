@extends('tenant.user.layouts.app')

@section('content')
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Requirement Notifications</h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                <!--   <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/admin/vendor') }}">Vendor</a></li>
                                    <li class="breadcrumb-item active">List</li>
                                </ol>
                            </div>
                        </div>
                    </div> -->
                </div>
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <!--     <div class="card-title">
                                        <h4>Posted requirements</h4>

                                    </div> -->
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="row-select" class="display table table-borderd table-hover">
                                            <thead>
                                            <tr>
                                                <th>User</th>
                                                <th>Subject</th>
                                                <th>Requirement</th>
                                                <th>Category</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            @if(isset($items))
                                                @foreach($items as $requirement)
                                                    <tr>
                                                        <td>{{ $requirement->fromUser->name }}</td>
                                                        <td>{{ $requirement->subject }}</td>
                                                        <td>{{ $requirement->requirement->title }}</td>
                                                        <td>{{ $requirement->category->name }}</td>
                                                        <td>
                                                            {!! $requirement->message !!}
                                                        </td>
                                                        <td>
                                                            {{--code by ramesh--}}
                                                            {{--@if(isset($requirement->bids) && count($requirement->bids) > 0)
                                                                <span class="badge badge-success">Placed Bid</span>
                                                             @else
                                                                <a href="{{ route('vendor.place-bid', $requirement->requirement_id) }}" class="btn btn-primary">Place Bid</a>
                                                            @endif--}}

                                                            @if(in_array($requirement->requirement_id, $req_arr))
                                                                <span class="badge badge-success">Placed Bid</span>
                                                            @else
                                                                <a href="{{ route('vendor.place-bid', $requirement->requirement_id) }}" class="btn btn-primary">Place Bid</a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                    </div>
                    <!-- /# row -->

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
    <script type="text/javascript">
        function attachRequirementData(title,requirement_id){

            $('#title').val(title);
            $('#requirement_id').val(requirement_id);

        }

        function makeRead(id){
            $.ajax({
                method: "POST",
                url: "{{route('notification.change-status')}}",
                data:{
                    id:id,
                    _token: '{!! csrf_token() !!}',
                },
                success: function(data){

                }
            });
        }
    </script>
@endsection

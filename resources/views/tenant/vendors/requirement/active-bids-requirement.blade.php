@extends('tenant.vendors.layouts.app')

@section('content')

    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Active Bids Requirements</h1>
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
                            @if($requirements->count()>0)
                            <div class="card">
                                <!--     <div class="card-title">
                                        <h4>Posted requirements</h4>

                                    </div> -->
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="row-select" class="display table table-borderd table-hover">
                                            <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Customer</th>
                                                <th>Phone</th>
                                                <th>Attachment</th>
                                                <th>Amount</th>
                                                <th>Description</th>
                                            </tr>
                                            </thead>

                                                @foreach($requirements as $requirement)
                                                    <tr>
                                                        <td>{{ $requirement->title }}</td>
                                                        <td>{{ $requirement->user->name }}</td>
                                                        <td>{{ $requirement->user->phone }}</td>
                                                        <td>
                                                            @if($requirement->requirementAdditional)

                                                                <a href="{{ url('/') }}/public/img/requirements/{{ $requirement->requirementAdditional->attachment }}"
                                                                   target="_blank">
                                                                    {{ $requirement->requirementAdditional->attachment }}
                                                                </a>
                                                            @else
                                                                --
                                                            @endif
                                                        </td>

                                                        <td>
                                                            {{ $requirement->acceptedBid->amount }}
                                                        </td>
                                                        <td>{{ $requirement->description }}</td>
                                                    </tr>
                                                @endforeach

                                        </table>
                                    </div>
                                </div>
                            </div>
                            @else
                                <div class="alert alert-danger text-center">
                                    No Active Bids Requirements
                                </div>
                        @endif
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                    </div>
                    <!-- /# row -->
                    @include('tenant.vendors.includes.footer')
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
    </script>
@endsection

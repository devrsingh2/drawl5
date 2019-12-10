@extends('master.layouts.admin')

@section('title', 'Application Dashboard')

@section('content')

    <div class="page-header">
        <div class="page-title">Application Dashboard</div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card p-3">
                <div class="table-responsive-sm">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Domain</th>
                            <th scope="col">Date Created</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($items))
                            @foreach($items as $item)
                                <tr>
                                    <th scope="row">
                                        {{ $item->id }}
                                    </th>
                                    <td>
                                        {{ $item->website->company_name }}
                                    </td>
                                    <td>
                                        {{ $item->website->company_email }}
                                    </td>
                                    <td>
                                        <a href="http://{{ $item->fqdn }}" target="_blank" >http://{{ $item->fqdn }}</a>
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                    <td nowrap="">
                                        {{--<button type="button" class="btn btn-outline-primary btn-sm">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>--}}
                                        <a href="{{ route('admin.domain.delete', [$item->website->id]) }}"
                                                class="btn btn-outline-danger btn-sm"
                                                onclick="return confirm('Do you really want to delete this domain.');">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>



            </div>
        </div>
    </div>

@endsection
<script>
    /*function deleteDomain(uuid) {
        if (confirm('Do you really want to delete this domain.')) {
            window.location.href='';
        }
    }*/
</script>
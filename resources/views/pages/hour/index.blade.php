@extends('layouts.master')

<!-- Page CSS -->
@section('pageStyle')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
@endsection

@section('content')
@if(session('success'))
<div class="alert alert-primary alert-dismissible" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
    </button>
</div>
@endif
<div class="container">
    <div class="card mt-5 px-3">
        <div>
            <h4 class="fw-bold py-3 mb-4 px-3">
                <span class="text-muted fw-light"><a
                        href="{{ route($parent_named_route.'.index') }}">{{ $module_name }}</a>
                    /</span> {{ ucfirst($page) }}
            </h4>
            <div class="dt-buttons move-right px-4"><a href="{{ route($parent_named_route.'.create') }}"
                    class="dt-button add-new btn btn-primary" tabindex="0" aria-controls="DataTables_Table_0">
                    <span>Add {{ $module_name }}</span>
                </a>
            </div>
        </div>
        <div class="card-body" style="overflow-x: scroll;">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Club Name</th>
                        <th>Day</th>
                        <th>Opening Time</th>
                        <th>Closing Time</th>
                        <th width="100px">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('scripts')

<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
<script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
<script src="{{ asset('assets/js/extended-ui-sweetalert2.js') }}"></script>

<script type="text/javascript">
    $(function() {

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route($parent_named_route.'.index') }}",
            columns: [{
                    data: 'sno',
                    name: 'sno'
                },
                {
                    data: 'club_name',
                    name: 'club.name'
                },
                {
                    data: 'day',
                    name: 'day'
                },
                {
                    data: 'opening_time',
                    name: 'opening_time'
                },
                {
                    data: 'closing_time',
                    name: 'closing_time'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });

    });
</script>
@endsection
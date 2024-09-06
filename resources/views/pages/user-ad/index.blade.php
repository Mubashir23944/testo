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
            <div class="row">
                <div class="col-md-6">
                    <h4 class="fw-bold py-3 mb-4 px-3">
                        <span class="text-muted fw-light"><a
                                href="{{ route($parent_named_route.'.index') }}">{{ $module_name }}</a>
                            /</span> {{ ucfirst($page) }}
                    </h4>
                </div>
            </div>
        </div>
        <div class="card-body" style="overflow-x: scroll;">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>User</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Media</th>
                        <th>Days</th>
                        <th>Amount</th>
                        <th>Currency</th>
                        <th>Redirect URL</th>
                        <th>Status</th>
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
    $(function () {

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('ads.index') }}",
            columns: [{
                    data: 'sno',
                    name: 'sno'
                },
                {
                    data: 'user',
                    name: 'user.name'
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'description',
                    name: 'description'
                },
                {
                    data: 'media',
                    name: 'media'
                },
                {
                    data: 'days',
                    name: 'days'
                },
                {
                    data: 'amount',
                    name: 'amount'
                },
                {
                    data: 'currency',
                    name: 'currency'
                },
                {
                    data: 'redirect_url',
                    name: 'redirect_url'
                },
                {
                    data: 'status',
                    name: 'status'
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

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
    <div class="card mt-5">
        <h4 class="fw-bold py-3 mb-4 px-3">
            <span class="text-muted fw-light"><a
                    href="{{ route($parent_named_route.'.index') }}">{{ $module_name }}</a>
                /</span> {{ ucfirst($page) }}
        </h4>
        <div class="card-body">
            <table class="table table-bordered activty-data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>To</th>
                        <th>From</th>
                        <th>Title</th>
                        <th>Body</th>
                        <th>Type</th>
                        <th>Views</th>
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

        var table = $('.activty-data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route($parent_named_route.'.index') }}",
            columns: [{
                    data: 'sno',
                    name: 'sno'
                },
                {
                    data: 'to',
                    name: 'user.name'
                },
                {
                    data: 'from',
                    name: 'actor.name'
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'body',
                    name: 'body'
                },
                {
                    data: 'type',
                    name: 'type'
                },
                {
                    data: 'viewed',
                    name: 'viewed'
                }
            ]
        });

    });

    function showFeedback(feedback) {
        console.log(feedback);
        $('#user_name').text(feedback.name);
        $('#user_subject').text(feedback.subject);
        $('#user_email').text(feedback.email);
        $('#user_message').text(feedback.message);
        $('#enableOTP').modal('show');
    }

</script>
@endsection

@extends('layouts.master')

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
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="enableOTP" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="text-center mb-4">
                    <h3 id="user_name" class="mb-3 text-primary"></h3>
                </div>
                <div class="mb-3">
                    <h6 class="mb-1">Subject:</h6>
                    <p id="user_subject" class="text-muted font-italic mb-0"></p>
                </div>
                <div class="mb-3">
                    <h6 class="mb-1">Message:</h6>
                    <p id="user_message" class="text-muted mb-0"></p>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="modalEnableOTPPhone">Email:</label>
                    <p id="user_email" class="text-muted mb-0"></p>
                </div>
                <div class="text-end">
                    <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Modal -->


@endsection

@section('scripts')

<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

<script type="text/javascript">
    $(function () {

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('contact.index') }}",
            columns: [{
                    data: 'sno',
                    name: 'sno'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'subject',
                    name: 'subject'
                },
                {
                    data: 'message',
                    name: 'message'
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

@extends('layouts.master')

<!-- Page CSS -->
@section('pageStyle')
<link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
<link rel="stylesheet" href="../../assets/vendor/libs/typeahead-js/typeahead.css" />
<link rel="stylesheet" href="../../assets/vendor/libs/select2/select2.css" />
<link rel="stylesheet" href="../../assets/vendor/libs/tagify/tagify.css" />
<link rel="stylesheet" href="../../assets/vendor/libs/bootstrap-select/bootstrap-select.css" />
<link rel="stylesheet" href="../../assets/vendor/libs/typeahead-js/typeahead.css" />@endsection

@section('content')
@if(session('success'))
    <div class="alert alert-primary alert-dismissible" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
@endif
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4 px-3">
                        <span class="text-muted fw-light"><a
                                href="{{ route($parent_named_route.'.index') }}">{{ $module_name }}</a>
                            /</span> Edit
                    </h4>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form
                            action="{{ route($parent_named_route.'.edit', ['id' => $role->id]) }}"
                            class="mb-3" method="POST">
                            @csrf
                            <div>
                                <label for="defaultFormControlInput" class="form-label">Name</label>
                                <input name="name" type="text" class="form-control" id="defaultFormControlInput"
                                    placeholder="Manager" value="{{ $role->name }}"
                                    aria-describedby="defaultFormControlHelp" />
                                @if($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <!-- Multiple -->
                            <div class="col-xs-12 mb-3 mt-3">
                                <div class="form-group">
                                <label for="defaultFormControlInput" class="form-label">Permissions</label>
                                    <br />
                                    @foreach($permissions as $value)
                                        <label>
                                            <input type="checkbox" @if (in_array($value->id, $rolePermissions)) checked
                                            @endif name="permission[]"
                                            value="{{ $value->name }}" class="name">
                                            {{ $value->name }}</label>
                                        <br />
                                    @endforeach
                                </div>
                            </div>
                            <div class="demo-inline-spacing">
                                <input type="submit" class="btn btn-primary move-right" value="Update" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
    @endsection

    @section('scripts')
    <script src="../../assets/vendor/libs/select2/select2.js"></script>
    <script src="../../assets/vendor/libs/tagify/tagify.js"></script>
    <script src="../../assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>
    <script src="../../assets/vendor/libs/bloodhound/bloodhound.js"></script>
    <script src="../../assets/js/forms-selects.js"></script>
    <script src="../../assets/js/forms-tagify.js"></script>
    <script src="../../assets/js/forms-typeahead.js"></script>
    @endsection

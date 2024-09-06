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
                /</span> Add
        </h4>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route($parent_named_route.'.create') }}" class="mb-3"
                            method="POST">
                            @csrf
                            <div>
                                <label for="defaultFormControlInput" class="form-label">name</label>
                                <input name="name" type="text" class="form-control" id="defaultFormControlInput"
                                    placeholder="Manager" value="{{ old('name') }}"
                                    aria-describedby="defaultFormControlHelp" />
                                @if($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <!-- Multiple -->
                            <div class="mt-3">
                                <label for="select2Multiple" class="form-label">Permissions</label>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <br />
                                        @foreach($permissions as $value)
                                            <label>
                                                <input type="checkbox" name="permission[]" value="{{ $value->name }}"
                                                    class="name" <blade
                                                    if|%20(is_array(old(%26%2339%3Bpermission%26%2339%3B))%20%26%26%20in_array(%24value-%3Ename%2C%20old(%26%2339%3Bpermission%26%2339%3B)))%20checked%20%40endif%3E>
                                                {{ $value->name }}
                                            </label>
                                            <br />
                                        @endforeach
                                    </div>
                                    @if($errors->has('permission'))
                                        <span
                                            class="text-danger">{{ $errors->first('permission') }}</span>
                                    @endif
                                </div>

                            </div>
                            <div class="demo-inline-spacing">
                                <input type="submit" class="btn btn-primary move-right" value="Add" />
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

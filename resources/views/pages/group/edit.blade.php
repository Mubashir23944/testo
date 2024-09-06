@extends('layouts.master')

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
                            action="{{ route('groups.edit', ['id' => $group->id]) }}"
                            class="mb-3" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input name="name" type="text" class="form-control" id="name" placeholder="Group Name"
                                    value="{{ $group->name }}" aria-describedby="defaultFormControlHelp" />
                                @if($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <div>
                                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                <textarea name="description" placeholder="Group Description" class="form-control" id="exampleFormControlTextarea1"
                                    rows="3">{{$group->description}}</textarea>
                                @if($errors->has('description'))
                                <span
                                    class="text-danger">{{ $errors->first('description') }}</span>
                                @endif
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

    @endsection
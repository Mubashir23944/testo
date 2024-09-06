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
                /</span> Add
        </h4>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('announcements.create') }}" class="mb-3" method="POST">
                            @csrf
                            <div>
                                <label for="defaultFormControlInput" class="form-label">Title</label>
                                <input name="title" type="text" class="form-control" id="defaultFormControlInput"
                                    placeholder="John Doe" value="" aria-describedby="defaultFormControlHelp" />
                                @if($errors->has('title'))
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                            <div>
                                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                <textarea name="description" class="form-control" id="exampleFormControlTextarea1"
                                    rows="3" placeholder="We are please to announce that..."></textarea>
                                @if($errors->has('description'))
                                    <span
                                        class="text-danger">{{ $errors->first('description') }}</span>
                                @endif
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

    @endsection

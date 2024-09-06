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
                            action="{{ route('ads.edit', ['id' => $ads->id]) }}"
                            class="mb-3" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlReadOnlyInput1" class="form-label">Username</label>
                                <input class="form-control" type="text" id="exampleFormControlReadOnlyInput1"
                                    value="{{ $ads->user->full_name }}" placeholder="Readonly input here..."
                                    readonly />
                            </div>
                            <div>
                                <label for="defaultFormControlInput" class="form-label">Title</label>
                                <input name="title" type="text" class="form-control" id="defaultFormControlInput"
                                    placeholder="John Doe" value="{{ $ads->title }}"
                                    aria-describedby="defaultFormControlHelp" />
                                @if($errors->has('title'))
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                            <div>
                                <label for="exampleFormControlTextarea1" class="form-label">Experience</label>
                                <textarea name="description" class="form-control" id="exampleFormControlTextarea1"
                                    rows="3">{{ $ads->description }}</textarea>
                                @if($errors->has('description'))
                                    <span
                                        class="text-danger">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlSelect1" class="form-label">Status</label>
                                <select name="status" class="form-select" id="exampleFormControlSelect1"
                                    aria-label="Default select example">
                                    <option value="1"
                                        {{ $ads->status == 1 ? 'selected' : '' }}>
                                        Active</option>
                                    <option value="0"
                                        {{ $ads->status == 0 ? 'selected' : '' }}>
                                        Inactive</option>
                                </select>
                                @if($errors->has('status'))
                                    <span
                                        class="text-danger">{{ $errors->first('status') }}</span>
                                @endif
                            </div>
                            <div>
                                <label for="defaultFormControlInput" class="form-label">Days</label>
                                <input name="days" type="number" class="form-control" id="defaultFormControlInput"
                                    placeholder="John Doe" value="{{ $ads->days }}"
                                    aria-describedby="defaultFormControlHelp" />
                                @if($errors->has('days'))
                                    <span class="text-danger">{{ $errors->first('days') }}</span>
                                @endif
                            </div>
                            <div>
                                <label for="defaultFormControlInput" class="form-label">Cost</label>
                                <input name="cost" type="number" class="form-control" id="defaultFormControlInput"
                                    placeholder="John Doe" value="{{ $ads->cost }}"
                                    aria-describedby="defaultFormControlHelp" />
                                @if($errors->has('cost'))
                                    <span class="text-danger">{{ $errors->first('cost') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlSelect1" class="form-label">Privacy</label>
                                <select name="privacy" class="form-select" id="exampleFormControlSelect1"
                                    aria-label="Default select example">
                                    <option value="private"
                                        {{ $ads->status == 'public' ? 'selected' : '' }}>
                                        Public</option>
                                    <option value="private"
                                        {{ $ads->status == 'private' ? 'selected' : '' }}>
                                        Private</option>
                                </select>
                                @if($errors->has('privacy'))
                                    <span
                                        class="text-danger">{{ $errors->first('privacy') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlReadOnlyInput1" class="form-label">Expiry Date</label>
                                <input class="form-control" type="text" id="exampleFormControlReadOnlyInput1"
                                    value="{{ customDateFormat($ads->expiry_date) }}"
                                    placeholder="Readonly input here..." readonly />
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

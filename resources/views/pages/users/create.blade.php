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
                        <form action="{{ route('users.create') }}" class="mb-3" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Username</label>
                                <input name="name" type="text" class="form-control" id="name" placeholder="John Doe"
                                    value="{{ old('name') }}"
                                    aria-describedby="defaultFormControlHelp" />
                                @if($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input name="email" type="email" class="form-control" id="email"
                                    placeholder="John@gmail.com" value="{{ old('email') }}"
                                    aria-describedby="defaultFormControlHelp" />
                                @if($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Password</label>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password"
                                        aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                @if($errors->has('password'))
                                    <span
                                        class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input name="phone" type="phone" class="form-control" id="phone"
                                    placeholder="+1-212-456-7890" value="{{ old('phone') }}"
                                    aria-describedby="defaultFormControlHelp" />
                                @if($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="formFile" class="form-label">Profile Photo</label>
                                <input class="form-control" type="file" id="formFile" name="picture">
                                @if($errors->has('picture'))
                                    <span
                                        class="text-danger">{{ $errors->first('picture') }}</span>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" class="form-select" id="status"
                                    aria-label="Default select example">
                                    <option value="1">
                                        Active</option>
                                    <option value="0">
                                        Inactive</option>
                                </select>
                                @if($errors->has('status'))
                                    <span
                                        class="text-danger">{{ $errors->first('status') }}</span>
                                @endif
                            </div>

                            <!-- <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select name="role" class="form-select" id="role" aria-label="Default select example">
@foreach($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
@endforeach
                                </select>
@if($errors->has('role'))
                                    <span class="text-danger">{{ $errors->first('role') }}</span>
@endif
                            </div> -->

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

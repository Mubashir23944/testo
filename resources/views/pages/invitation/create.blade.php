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
                        <form action="{{ route($parent_named_route.'.create') }}" class="mb-3" method="POST">
                            @csrf
                            <div>
                                <label for="defaultFormControlInput" class="form-label">Reservations</label>
                                <select name="reservation_id" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp">
                                    @foreach($reservations as $reservation)
                                    <option value="{{$reservation->id}}">{{$reservation->id}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="defaultFormControlInput" class="form-label">Players</label>
                                <select name="player_id" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp">
                                    @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="defaultFormControlInput" class="form-label">Status</label>
                                <select name="status" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp">
                                    <option value="0">Inactive</option>
                                    <option value="1">Active</option>
                                </select>
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
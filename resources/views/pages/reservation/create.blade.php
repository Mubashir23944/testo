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
                        <form action="{{ route('reservations.create') }}" class="mb-3" method="POST">
                            @csrf
                            <div>
                                <label for="defaultFormControlInput" class="form-label">Club</label>
                                <select name="club_id" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp">
                                    @foreach($clubs as $club)
                                    <option value="{{$club->id}}">{{$club->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="defaultFormControlInput" class="form-label">Reservation Date</label>
                                <input name="reservation_date" type="date" class="form-control" id="defaultFormControlInput"
                                    placeholder="New York" value="" aria-describedby="defaultFormControlHelp" />
                                @if($errors->has('reservation_date'))
                                <span class="text-danger">{{ $errors->first('reservation_date') }}</span>
                                @endif
                            </div>
                            <div>
                                <label for="longitudeInput" class="form-label">Start Time</label>
                                <input name="start_time" type="time" class="form-control"
                                    value="" aria-describedby="defaultFormControlHelp" />
                                @if($errors->has('start_time'))
                                <span class="text-danger">{{ $errors->first('start_time') }}</span>
                                @endif
                            </div>
                            <div>
                                <label for="longitudeInput" class="form-label">End Time</label>
                                <input name="end_time" type="time" class="form-control" id="longitudeInput"
                                    value="" aria-describedby="defaultFormControlHelp" />
                                @if($errors->has('end_time'))
                                <span class="text-danger">{{ $errors->first('end_time') }}</span>
                                @endif
                            </div>
                            <div>
                                <label for="defaultFormControlInput" class="form-label">Day</label>
                                <select name="day" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp">
                                    <option value="0">Sunday</option>
                                    <option value="1">Monday</option>
                                    <option value="2">Tuesday</option>
                                    <option value="3">Wednesday</option>
                                    <option value="4">Thursday</option>
                                    <option value="5">Friday</option>
                                    <option value="6">Saturday</option>
                                </select>
                            </div>
                            <!-- <div>
                                <label for="defaultFormControlInput" class="form-label">Status</label>
                                <select name="status" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp">
                                    <option value="pending">Pending</option>
                                    <option value="cancelled">Cancelled</option>
                                    <option value="accepted">Accepted</option>
                                </select>
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
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
                        <form action="{{ route('reservations.edit', ['id' => $reservation->id]) }}" class="mb-3" method="POST">
                            @csrf
                            <div>
                                <label for="defaultFormControlInput" class="form-label">Club</label>
                                <select name="club_id" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp">
                                    @foreach($clubs as $club)
                                    <option value="{{$club->id}}" {{$reservation->club_id == $club->id ? 'selected' : ''}}>{{$club->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="defaultFormControlInput" class="form-label">Reservation Date</label>
                                <input
                                    name="reservation_date"
                                    type="date"
                                    class="form-control"
                                    value="{{ $reservation->reservation_date ? $reservation->reservation_date->format('Y-m-d') : '' }}"
                                    aria-describedby="defaultFormControlHelp" />
                                @if($errors->has('reservation_date'))
                                <span class="text-danger">{{ $errors->first('reservation_date') }}</span>
                                @endif
                            </div>

                            <div>
                                <label for="longitudeInput" class="form-label">Start Time</label>
                                <input
                                    name="start_time"
                                    type="time"
                                    class="form-control"
                                    value="{{ $reservation->start_time ? $reservation->start_time->format('H:i') : '' }}"
                                    aria-describedby="defaultFormControlHelp" />
                                @if($errors->has('start_time'))
                                <span class="text-danger">{{ $errors->first('start_time') }}</span>
                                @endif
                            </div>

                            <div>
                                <label for="longitudeInput" class="form-label">End Time</label>
                                <input
                                    name="end_time"
                                    type="time"
                                    class="form-control"
                                    id="longitudeInput"
                                    value="{{ $reservation->end_time ? $reservation->end_time->format('H:i') : '' }}"
                                    aria-describedby="defaultFormControlHelp" />
                                @if($errors->has('end_time'))
                                <span class="text-danger">{{ $errors->first('end_time') }}</span>
                                @endif
                            </div>

                            <div>
                                <label for="defaultFormControlInput" class="form-label">Day</label>
                                <select name="day" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp">
                                    @foreach($days as $key => $day)
                                    <option value="{{$key}}" {{$reservation->day == $key ? 'selected' : ''}}>{{$day}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div>
                                <label for="defaultFormControlInput" class="form-label">Status</label>
                                <select name="status" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp">
                                    @foreach($statuses as $key => $status)
                                    <option value="{{$key}}" {{$reservation->status == $key ? 'selected' : ''}}>{{$status}}</option>
                                    @endforeach
                                </select>
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
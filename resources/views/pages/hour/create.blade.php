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
                                <label for="defaultFormControlInput" class="form-label">Clubs</label>
                                <select name="club_id" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp">
                                    @foreach($clubs as $club)
                                    <option value="{{$club->id}}">{{$club->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="defaultFormControlInput" class="form-label">Day</label>
                                <select name="day" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp">
                                    @foreach($days as $key => $day)
                                    <option value="{{$key}}">{{$day}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="form-label">Opening Time</label>
                                <input name="opening_time" type="time" class="form-control"
                                    value="" aria-describedby="defaultFormControlHelp" />
                                @if($errors->has('opening_time'))
                                <span class="text-danger">{{ $errors->first('opening_time') }}</span>
                                @endif
                            </div>

                            <div>
                                <label class="form-label">Closing Time</label>
                                <input name="closing_time" type="time" class="form-control"
                                    value="" aria-describedby="defaultFormControlHelp" />
                                @if($errors->has('closing_time'))
                                <span class="text-danger">{{ $errors->first('closing_time') }}</span>
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
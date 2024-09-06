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
                        <form action="{{ route('tournaments.edit', ['id' => $tournament->id]) }}" class="mb-3" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <label for="defaultFormControlInput" class="form-label">Users</label>
                                <select name="user_id" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp">
                                    @foreach($users as $user)
                                    <option value="{{$user->id}}" {{$tournament->user_id == $user->id ? 'selected' : ''}}>{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="defaultFormControlInput" class="form-label">Club</label>
                                <select name="club_id" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp">
                                    @foreach($clubs as $club)
                                    <option value="{{$club->id}}" {{$tournament->club_id == $club->id ? 'selected' : ''}}>{{$club->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="defaultFormControlInput" class="form-label">name</label>
                                <input name="name" type="text" class="form-control" id="defaultFormControlInput"
                                    placeholder="Tournament Name" value="{{$tournament->name}}" aria-describedby="defaultFormControlHelp" />
                                @if($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <!-- <div>
                                <label for="defaultFormControlInput" class="form-label">slug</label>
                                <input name="slug" type="text" class="form-control" id="defaultFormControlInput"
                                    placeholder="New York" value="{{$tournament->slug}}" aria-describedby="defaultFormControlHelp" />
                                @if($errors->has('slug'))
                                <span class="text-danger">{{ $errors->first('slug') }}</span>
                                @endif
                            </div> -->
                            <div>
                                <label for="defaultFormControlInput" class="form-label">picture</label>
                                <input name="picture" type="file" class="form-control" id="defaultFormControlInput"
                                    placeholder="New York" value="{{$tournament->picture}}" aria-describedby="defaultFormControlHelp" />
                                <img src="{{$tournament->picture}}" height="50px" width="100px">
                                <span class="text-info">{{str_replace(env('UPLOAD_URL').'tournaments/', '', $tournament->picture)}}</span>
                                @if($errors->has('picture'))
                                <span class="text-danger">{{ $errors->first('picture') }}</span>
                                @endif
                            </div>
                            <div>
                                <label for="defaultFormControlInput" class="form-label">Start Date</label>
                                <input
                                    name="start_date"
                                    type="date"
                                    class="form-control"
                                    value="{{ $tournament->start_date ? $tournament->start_date->format('Y-m-d') : '' }}"
                                    aria-describedby="defaultFormControlHelp" />
                                @if($errors->has('start_date'))
                                <span class="text-danger">{{ $errors->first('start_date') }}</span>
                                @endif
                            </div>

                            <div>
                                <label for="defaultFormControlInput" class="form-label">End Date</label>
                                <input
                                    name="end_date"
                                    type="date"
                                    class="form-control"
                                    value="{{ $tournament->end_date ? $tournament->end_date->format('Y-m-d') : '' }}"
                                    aria-describedby="defaultFormControlHelp" />
                                @if($errors->has('end_date'))
                                <span class="text-danger">{{ $errors->first('end_date') }}</span>
                                @endif
                            </div>

                            <div>
                                <label for="longitudeInput" class="form-label">Start Time</label>
                                <input
                                    name="start_time"
                                    type="time"
                                    class="form-control"
                                    value="{{ $tournament->start_time ? $tournament->start_time->format('H:i') : '' }}"
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
                                    value="{{ $tournament->end_time ? $tournament->end_time->format('H:i') : '' }}"
                                    aria-describedby="defaultFormControlHelp" />
                                @if($errors->has('end_time'))
                                <span class="text-danger">{{ $errors->first('end_time') }}</span>
                                @endif
                            </div>

                            <div>
                                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                <textarea name="description" class="form-control" id="exampleFormControlTextarea1"
                                    rows="3" placeholder="Tournament Dscription">{{$tournament->description}}</textarea>
                                @if($errors->has('description'))
                                <span
                                    class="text-danger">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                            <div>
                                <label for="defaultFormControlInput" class="form-label">Status</label>
                                <select name="status" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp">
                                    <option value="0" {{ $tournament->status == "0" ? 'selected' : ''}}>Pending</option>
                                    <option value="1" {{ $tournament->status == "1" ? 'selected' : ''}}>Active</option>
                                    <option value="2" {{ $tournament->status == "2" ? 'selected' : ''}}>Finished</option>
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
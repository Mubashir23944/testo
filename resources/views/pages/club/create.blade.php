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
                        <form action="{{ route('clubs.create') }}" class="mb-3" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <label for="defaultFormControlInput" class="form-label">name</label>
                                <input name="name" type="text" class="form-control" id="defaultFormControlInput"
                                    placeholder="Club Name" value="" aria-describedby="defaultFormControlHelp" />
                                @if($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div>
                                <label for="defaultFormControlInput" class="form-label">logo</label>
                                <input name="logo" type="file" class="form-control" id="defaultFormControlInput"
                                    placeholder="New York" value="" aria-describedby="defaultFormControlHelp" />
                                @if($errors->has('logo'))
                                <span class="text-danger">{{ $errors->first('logo') }}</span>
                                @endif
                            </div>
                            <div>
                                <label for="defaultFormControlInput" class="form-label">location</label>
                                <input name="location" type="text" class="form-control" id="defaultFormControlInput"
                                    placeholder="New York" value="" aria-describedby="defaultFormControlHelp" />
                                @if($errors->has('location'))
                                <span class="text-danger">{{ $errors->first('location') }}</span>
                                @endif
                            </div>
                            <div>
                                <label for="latitudeInput" class="form-label">Latitude</label>
                                <input name="latitude" type="text" class="form-control" id="latitudeInput"
                                    placeholder="37.7749" value="" aria-describedby="latitudeHelp"
                                    inputmode="decimal" pattern="^-?\d+(\.\d+)?$" />
                                @if($errors->has('latitude'))
                                <span class="text-danger">{{ $errors->first('latitude') }}</span>
                                @endif
                            </div>
                            <div>
                                <label for="longitudeInput" class="form-label">Longitude</label>
                                <input name="longitude" type="text" class="form-control" id="longitudeInput"
                                    placeholder="-122.4194" value="" aria-describedby="defaultFormControlHelp"
                                    inputmode="decimal" pattern="^-?\d+(\.\d+)?$" />
                                @if($errors->has('longitude'))
                                <span class="text-danger">{{ $errors->first('longitude') }}</span>
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
                            <div>
                                <label for="defaultFormControlInput" class="form-label">Total Courts</label>
                                <input name="total_courts" type="number" class="form-control" id="defaultFormControlInput"
                                    placeholder="4" value="" aria-describedby="defaultFormControlHelp" />
                                @if($errors->has('total_courts'))
                                <span class="text-danger">{{ $errors->first('total_courts') }}</span>
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
    <script>
        document.getElementById('latitudeInput').addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9.-]/g, '');
        });

        document.getElementById('longitudeInput').addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9.-]/g, '');
        });
    </script>
    @endsection
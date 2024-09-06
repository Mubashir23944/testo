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
            <span class="text-muted fw-light">{{ $module_name }}/</span> Edit
        </h4>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('courts.edit', ['id' => $court->id]) }}" class="mb-3" method="POST">
                            @csrf
                            <div>
                                <label for="defaultFormControlInput" class="form-label">Club</label>
                                <select name="club_id" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp">
                                    @foreach($clubs as $club)
                                    <option value="{{$club->id}}" {{$court->club_id == $club->id ? 'selected' : ''}}>{{$club->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="defaultFormControlInput" class="form-label">name</label>
                                <input name="name" type="text" class="form-control" id="defaultFormControlInput"
                                    placeholder="Club Name" value="{{$court->name}}" aria-describedby="defaultFormControlHelp" />
                                @if($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
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
    <script>
        document.getElementById('latitudeInput').addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9.-]/g, '');
        });

        document.getElementById('longitudeInput').addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9.-]/g, '');
        });
    </script>
    @endsection
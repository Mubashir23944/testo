@extends('layouts.master')

<!-- Page CSS -->
@section('pageStyle')
<link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-profile.css') }}" />
@endsection

@section('content')
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">


    <h4 class="fw-bold py-3 mb-4 px-3">
        <span class="text-muted fw-light"><a
                href="{{ route($parent_named_route.'.index') }}">{{ $module_name }}</a>
            /</span> {{ ucfirst($page) }}
    </h4>

    <!-- Header -->
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="user-profile-header-banner">
                    <img src="../../assets/img/pages/profile-banner.png" alt="Banner image" class="rounded-top">
                </div>
                <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                    <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                        <img src="{{ $court->club->logo }}" alt="user image"
                            class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img">
                    </div>
                    <div class="flex-grow-1 mt-3 mt-sm-5">
                        <div
                            class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                            <div class="user-profile-info">
                                <h4>{{ $court->name }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Header -->

    <!-- User Profile Content -->
    <div class="row">
        <div class="col-xl-12 col-lg-5 col-md-5">
            <!-- About User -->
            <div class="card mb-4">
                <div class="card-body">
                    <small class="text-muted text-uppercase">About</small>
                    <ul class="list-unstyled mb-4 mt-3">
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><span
                                class="fw-semibold mx-2">Court Name:</span> <span>{{ $court->name }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-check"></i><span
                                class="fw-semibold mx-2">Status:</span>
                            <span>{{ handleBooleanStatus($court->status) }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-star"></i><span
                                class="fw-semibold mx-2">Belongs To:</span>
                            <span>{{ ucfirst($court->club->name) }} Club</span>
                        </li>
                    </ul>
                    <small class="text-muted text-uppercase">Creator Contacts</small>
                    <ul class="list-unstyled mb-4 mt-3">
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-phone"></i><span
                                class="fw-semibold mx-2">Contact:</span>
                            <span>{{ $court->club->user->phone }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-envelope"></i><span
                                class="fw-semibold mx-2">Creator Email:</span>
                            <span>{{ $court->club->user->email }}</span></li>
                    </ul>
                </div>
            </div>
            <!--/ About User -->
            <!-- Profile Overview -->
            <div class="card mb-4">
                <div class="card-body">
                    <small class="text-muted text-uppercase">Features</small>
                    <ul class="list-unstyled mt-3 mb-0">
                        @if(count($court->club->features) > 0 )
                            @foreach($court->club->features as $feature)
                                <li class="d-flex align-items-center mb-3"><i class="bx bx-check"></i><span
                                        class="fw-semibold mx-2">{{ $feature->name }}:</span>
                                    <span>{{ handleBooleanStatus($feature->status) }}</span>
                                </li>
                            @endforeach
                        @else
                            <p>No Feature Listed</p>
                        @endif
                    </ul>
                </div>
            </div>
            <!--/ Profile Overview -->
        </div>

    </div>
    <!--/ User Profile Content -->
</div>
<!-- / Content -->
@endsection


@section('scripts')
<script src="{{ asset('assets/js/pages-profile') }}"></script>
@endsection

<!-- Page JS -->

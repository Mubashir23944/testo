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
                        <img src="{{ $tournament->picture }}" alt="user image"
                            class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img">
                    </div>
                    <div class="flex-grow-1 mt-3 mt-sm-5">
                        <div
                            class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                            <div class="user-profile-info">
                                <h4>{{ $tournament->name }}</h4>
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
                                class="fw-semibold mx-2">Tournament Name:</span> <span>{{ $tournament->name }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-check"></i><span
                                class="fw-semibold mx-2">Status:</span>
                            <span>{{ $tournament->status ? 'Active' : 'Inactive' }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><span
                                class="fw-semibold mx-2">Description:</span>
                            <span>{{ $tournament->description }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><span
                                class="fw-semibold mx-2">Slug:</span> <span>{{ $tournament->slug }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bxs-time"></i><span
                                class="fw-semibold mx-2">Start Date and Time:</span>
                            <span>{{ customDateFormat($tournament->start_date) }} -
                                {{ customTimeFormat($tournament->start_time) }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bxs-time"></i><span
                                class="fw-semibold mx-2">End Date and Time:</span>
                            <span>{{ customDateFormat($tournament->end_date) }} -
                                {{ customTimeFormat($tournament->end_time) }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-star"></i><span
                                class="fw-semibold mx-2">Creator:</span>
                            <span>{{ ucfirst($tournament->user->name) }}</span>
                        </li>
                    </ul>
                    <small class="text-muted text-uppercase">Creator Contacts</small>
                    <ul class="list-unstyled mb-4 mt-3">
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-phone"></i><span
                                class="fw-semibold mx-2">Contact:</span> <span>{{ $tournament->user->phone }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-envelope"></i><span
                                class="fw-semibold mx-2">Creator Email:</span>
                            <span>{{ $tournament->user->email }}</span></li>
                    </ul>
                </div>
            </div>
            <!--/ About User -->
            <!-- Profile Overview -->
            <div class="card mb-4">
                <div class="card-body">
                    <small class="text-muted text-uppercase">Players</small>
                    <ul class="list-unstyled mt-3 mb-0">
                        @if(count($tournament->users) > 0 )
                            @foreach($tournament->users as $player)
                                <li class="d-flex align-items-center mb-3"><i class="bx bx-check"></i><span
                                        class="fw-semibold mx-2">{{ $player->name }}:</span>
                                    <span>{{ handleBooleanStatus($player->status) }}</span>
                                </li>
                            @endforeach
                        @else
                            <p>No Players Listed</p>
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

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
                        <img src="{{ $club->logo }}" alt="user image"
                            class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img">
                    </div>
                    <div class="flex-grow-1 mt-3 mt-sm-5">
                        <div
                            class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                            <div class="user-profile-info">
                                <h4>{{ $club->name }}</h4>
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
        <div class="col-xl-4 col-lg-5 col-md-5">
            <!-- About User -->
            <div class="card mb-4">
                <div class="card-body">
                    <small class="text-muted text-uppercase">About</small>
                    <ul class="list-unstyled mb-4 mt-3">
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><span
                                class="fw-semibold mx-2">Club Name:</span> <span>{{ $club->name }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-check"></i><span
                                class="fw-semibold mx-2">Status:</span>
                            <span>{{ $club->status ? 'Active' : 'Inactive' }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-star"></i><span
                                class="fw-semibold mx-2">Creator:</span>
                            <span>{{ ucfirst($club->user->name) }}</span>
                        </li>
                    </ul>
                    <small class="text-muted text-uppercase">Creator Contacts</small>
                    <ul class="list-unstyled mb-4 mt-3">
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-phone"></i><span
                                class="fw-semibold mx-2">Contact:</span> <span>{{ $club->user->phone }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-envelope"></i><span
                                class="fw-semibold mx-2">Creator Email:</span>
                            <span>{{ $club->user->email }}</span></li>
                    </ul>
                </div>
            </div>
            <!--/ About User -->
            <!-- Profile Overview -->
            <div class="card mb-4">
                <div class="card-body">
                    <small class="text-muted text-uppercase">Features</small>
                    <ul class="list-unstyled mt-3 mb-0">
                        @if(count($club->features) > 0 )
                            @foreach($club->features as $feature)
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
        <div class="col-md-12 col-lg-8 order-4 order-lg-3 ">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2">Tournaments Timeline</h5>
                </div>
                <div class="card-body">
                    <!-- Tournaments Timeline -->
                    <ul class="timeline">
                        @if(count($club->tournaments) > 0)
                            @foreach($club->tournaments as $tournament)
                                <li class="timeline-item timeline-item-transparent">
                                    <span class="timeline-point timeline-point-primary"></span>
                                    <div class="timeline-event">
                                        <div class="timeline-header mb-1">
                                            <h6 class="mb-0">{{ $tournament->name }}</h6>
                                            <small class="text-muted">Start Date:
                                                {{ customDateFormat($tournament->start_date) }}</small>
                                            <small class="text-muted">End Date:
                                                {{ customDateFormat($tournament->end_date) }}</small>
                                        </div>
                                        <p class="mb-2">{{ $tournament->description }}</p>
                                        <div class="d-flex">
                                            <a href="javascript:void(0)" class="d-flex align-items-center me-3">
                                                <img src="{{ $club->logo }}" alt="PDF image" width="23" class="me-2">
                                                <h6 class="mb-0">{{ $tournament->slug }}</h6>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        @else
                            <p>No tournament yet</p>
                        @endif
                    </ul>
                    <!-- /Tournaments Timeline -->
                </div>
            </div>
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

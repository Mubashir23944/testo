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
                                class="fw-semibold mx-2">Text : {{ $post->text }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-star"></i><span
                                class="fw-semibold mx-2">Parent Post :
                                {{ $post->sharedPost ? $post->sharedPost->text : 'No Parent' }}</span>
                            <span></span>
                        </li>
                    </ul>
                    <small class="text-muted text-uppercase">Creator Contacts</small>
                    <ul class="list-unstyled mb-4 mt-3">
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-phone"></i><span
                                class="fw-semibold mx-2">Contact: {{ $post->user->name }}</span> <span></span>
                        </li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-envelope"></i><span
                                class="fw-semibold mx-2">Creator Email: {{ $post->user->email }}</span>
                            <span></span></li>
                    </ul>
                </div>
            </div>
            <!--/ About User -->
            <!-- Profile Overview -->
            <div class="card mb-4">
                <div class="card-body">
                    <small class="text-muted text-uppercase">Comments</small>
                    <ul class="list-unstyled mt-3 mb-0">
                        @if(count($post->comments) > 0 )
                            @foreach($post->comments as $comment)
                                <li class="d-flex align-items-center mb-3"><i class="bx bx-check"></i><span
                                        class="fw-semibold mx-2">{{ $comment->user->name }}:</span>
                                    <span>{{ $comment->comment }}</span>
                                </li>
                            @endforeach
                        @else
                            <p>No Comment Listed</p>
                        @endif
                    </ul>
                </div>
            </div>
            <!--/ Profile Overview -->
        </div>
        <div class="col-md-12 col-lg-8 order-4 order-lg-3 ">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2">Post Media</h5>
                </div>
                <div class="card-body">
                    <ul class="timeline">
                        @if($post->media->isNotEmpty())
                            @foreach($post->media as $value)
                                <li class="timeline-item timeline-item-transparent">
                                    <span class="timeline-point timeline-point-primary"></span>
                                    <div class="timeline-event">
                                        <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center mb-3">
                                            @if($value->media)
                                                @php
                                                    $mediaUrl = $value->media;
                                                    $imageExtensions = ['jpg', 'jpeg', 'JPG', 'png', 'gif'];
                                                    $videoExtensions = ['mp4', 'webm', 'ogg'];
                                                    $extension = pathinfo($mediaUrl, PATHINFO_EXTENSION);
                                                @endphp

                                                @if(in_array($extension, $imageExtensions)) <!-- Check for image extensions -->
                                                    <a href="javascript:void(0)" class="d-flex align-items-center me-3">
                                                        <img src="{{ $mediaUrl }}" class="img-fluid me-2" width="50%" height="50%" alt="Media">
                                                    </a>
                                                @elseif(in_array($extension, $videoExtensions)) <!-- Check for video extensions -->
                                                    <a href="javascript:void(0)" class="d-flex align-items-center me-3">
                                                        <video src="{{ $mediaUrl }}" class="consistent-video" width="50%" height="50%" controls></video>
                                                    </a>
                                                @else
                                                    <p>Unsupported media type</p>
                                                @endif
                                            @else
                                                <p>Not Available</p>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        @else
                            <p>No media yet</p>
                        @endif
                    </ul>
                </div>

            </div>
        </div>

    </div>
</div>
<!-- / Content -->
@endsection


@section('scripts')
<script src="{{ asset('assets/js/pages-profile') }}"></script>
@endsection

<!-- Page JS -->

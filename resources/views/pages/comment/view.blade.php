@extends('layouts.master')

<!-- Page CSS -->
@section('pageStyle')
<link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-profile.css') }}" />
@endsection

@section('content')
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">


    <h4 class="fw-bold py-3 mb-4 px-3">
        <span class="text-muted fw-light">{{ $module_name }}
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
        <div class="col-xl-12 col-lg-5 col-md-5">
            <!-- About User -->
            <div class="card mb-4">
                <div class="card-body">
                    <small class="text-muted text-uppercase">About</small>
                    <ul class="list-unstyled mb-4 mt-3">
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><span
                                class="fw-semibold mx-2">Text : {{ $comment->comment }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-star"></i><span
                                class="fw-semibold mx-2">Parent Comment :
                                {{ $comment->parent ? $comment->parent->comment : 'No Parent' }}</span>
                            <span></span>
                        </li>
                    </ul>
                    <small class="text-muted text-uppercase">Creator Contacts</small>
                    <ul class="list-unstyled mb-4 mt-3">
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-phone"></i><span
                                class="fw-semibold mx-2">Contact: {{ $comment->user->name }}</span> <span></span>
                        </li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-envelope"></i><span
                                class="fw-semibold mx-2">Creator Email: {{ $comment->user->email }}</span>
                            <span></span>
                        </li>
                    </ul>
                </div>
            </div>
            <!--/ About User -->
            <!-- Profile Overview -->
            <div class="card mb-4">
                <div class="card-body">
                    <small class="text-muted text-uppercase">Replies</small>
                    <ul class="list-unstyled mt-3 mb-0">
                        @if(count($comment->children) > 0 )
                        @foreach($comment->children as $child)
                        <li class="d-flex align-items-center mb-3">
                            <i class="bx bx-check"></i>
                            <span class="fw-semibold mx-2">{{ $child->user->name }}:</span>
                            <span>{{ $child->comment }}</span>
                            <small class="text-muted ms-2">
                                ({{ @customDateFormat($child->created_at) }} - {{ @customTimeFormat($child->created_at) }})
                            </small>
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
    </div>
</div>
<!-- / Content -->
@endsection


@section('scripts')
<script src="{{ asset('assets/js/pages-profile') }}"></script>
@endsection

<!-- Page JS -->
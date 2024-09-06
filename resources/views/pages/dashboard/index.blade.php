@extends('layouts.master')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row gy-4">
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="avatar">
                        <img src="../../assets/img/icons/unicons/rocket.png" alt="Avatar" class="rounded-circle">
                    </div>
                    <div class="ms-3">
                        <h5 class="card-title mb-0">Users</h5>
                        <h3 class="mb-0">{{ $users }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="avatar">
                        <img src="../../assets/img/icons/unicons/rocket.png" alt="Avatar" class="rounded-circle">
                    </div>
                    <div class="ms-3">
                        <h5 class="card-title mb-0">Clubs</h5>
                        <h3 class="mb-0">{{ $clubs }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="avatar">
                        <img src="../../assets/img/icons/unicons/rocket.png" alt="Avatar" class="rounded-circle">
                    </div>
                    <div class="ms-3">
                        <h5 class="card-title mb-0">Courts</h5>
                        <h3 class="mb-0">{{ $courts }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="avatar">
                        <img src="../../assets/img/icons/unicons/rocket.png" alt="Avatar" class="rounded-circle">
                    </div>
                    <div class="ms-3">
                        <h5 class="card-title mb-0">Events</h5>
                        <h3 class="mb-0">{{ $events }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="avatar">
                        <img src="../../assets/img/icons/unicons/rocket.png" alt="Avatar" class="rounded-circle">
                    </div>
                    <div class="ms-3">
                        <h5 class="card-title mb-0">Features</h5>
                        <h3 class="mb-0">{{ $features }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="avatar">
                        <img src="../../assets/img/icons/unicons/rocket.png" alt="Avatar" class="rounded-circle">
                    </div>
                    <div class="ms-3">
                        <h5 class="card-title mb-0">Groups</h5>
                        <h3 class="mb-0">{{ $groups }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="avatar">
                        <img src="../../assets/img/icons/unicons/rocket.png" alt="Avatar" class="rounded-circle">
                    </div>
                    <div class="ms-3">
                        <h5 class="card-title mb-0">Invitations</h5>
                        <h3 class="mb-0">{{ $invitations }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="avatar">
                        <img src="../../assets/img/icons/unicons/rocket.png" alt="Avatar" class="rounded-circle">
                    </div>
                    <div class="ms-3">
                        <h5 class="card-title mb-0">Tournaments</h5>
                        <h3 class="mb-0">{{ $tournaments }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="avatar">
                        <img src="../../assets/img/icons/unicons/rocket.png" alt="Avatar" class="rounded-circle">
                    </div>
                    <div class="ms-3">
                        <h5 class="card-title mb-0">Conversations</h5>
                        <h3 class="mb-0">{{ $conversations }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="avatar">
                        <img src="../../assets/img/icons/unicons/rocket.png" alt="Avatar" class="rounded-circle">
                    </div>
                    <div class="ms-3">
                        <h5 class="card-title mb-0">Activities</h5>
                        <h3 class="mb-0">{{ $activities }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="avatar">
                        <img src="../../assets/img/icons/unicons/rocket.png" alt="Avatar" class="rounded-circle">
                    </div>
                    <div class="ms-3">
                        <h5 class="card-title mb-0">Feedbacks</h5>
                        <h3 class="mb-0">{{ $feedbacks }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="avatar">
                        <img src="../../assets/img/icons/unicons/rocket.png" alt="Avatar" class="rounded-circle">
                    </div>
                    <div class="ms-3">
                        <h5 class="card-title mb-0">Posts</h5>
                        <h3 class="mb-0">{{ $posts }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="avatar">
                        <img src="../../assets/img/icons/unicons/rocket.png" alt="Avatar" class="rounded-circle">
                    </div>
                    <div class="ms-3">
                        <h5 class="card-title mb-0">Comments</h5>
                        <h3 class="mb-0">{{ $comments }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="avatar">
                        <img src="../../assets/img/icons/unicons/rocket.png" alt="Avatar" class="rounded-circle">
                    </div>
                    <div class="ms-3">
                        <h5 class="card-title mb-0">User Ads</h5>
                        <h3 class="mb-0">{{ $user_ads }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="avatar">
                        <img src="../../assets/img/icons/unicons/rocket.png" alt="Avatar" class="rounded-circle">
                    </div>
                    <div class="ms-3">
                        <h5 class="card-title mb-0">User Devices</h5>
                        <h3 class="mb-0">{{ $user_devices }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="avatar">
                        <img src="../../assets/img/icons/unicons/community.png" alt="Avatar" class="rounded-circle">
                    </div>
                    <div class="ms-3">
                        <h5 class="card-title mb-0">Announcements</h5>
                        <h3 class="mb-0">{{ $announcement }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="avatar">
                        <img src="../../assets/img/icons/unicons/community.png" alt="Avatar" class="rounded-circle">
                    </div>
                    <div class="ms-3">
                        <h5 class="card-title mb-0">Reservations</h5>
                        <h3 class="mb-0">{{ $reservation }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="avatar">
                        <img src="../../assets/img/icons/unicons/community.png" alt="Avatar" class="rounded-circle">
                    </div>
                    <div class="ms-3">
                        <h5 class="card-title mb-0">Working Hours</h5>
                        <h3 class="mb-0">{{ $working_hours }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

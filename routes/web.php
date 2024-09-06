<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AnnouncementsController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\CourtController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\FeedbacksController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvitationsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\UserAdsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDeviceController;
use App\Http\Controllers\WorkingHoursController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');

    Route::post('/updatePassword', [ChangePasswordController::class, 'updatePassword'])->name('updatePassword');

    Route::middleware(['auth'])->prefix('admin')->group(function () {

        Route::prefix('users')->name('users.')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::any('/create', [UserController::class, 'create'])->name('create');
            Route::get('/{id}', [UserController::class, 'view'])->name('view');
            Route::any('/edit/{id}', [UserController::class, 'edit'])->name('edit');
            Route::get('/status/{id}', [UserController::class, 'status'])->name('status');
            Route::get('/delete/{id}', [UserController::class, 'delete'])->name('delete');
        });

        Route::prefix('clubs')->name('clubs.')->group(function () {
            Route::get('/', [ClubController::class, 'index'])->name('index');
            Route::any('/create', [ClubController::class, 'create'])->name('create');
            Route::any('/edit/{id}', [ClubController::class, 'edit'])->name('edit');
            Route::get('/{id}', [ClubController::class, 'view'])->name('view');
            Route::get('/status/{id}', [ClubController::class, 'status'])->name('status');
            Route::get('/delete/{id}', [ClubController::class, 'delete'])->name('delete');
        });

        Route::prefix('features')->name('features.')->group(function () {
            Route::get('/', [FeatureController::class, 'index'])->name('index');
            Route::any('/create', [FeatureController::class, 'create'])->name('create');
            Route::any('/edit/{id}', [FeatureController::class, 'edit'])->name('edit');
            Route::get('/status/{id}', [FeatureController::class, 'status'])->name('status');
            Route::get('/delete/{id}', [FeatureController::class, 'delete'])->name('delete');
        });

        Route::prefix('groups')->name('groups.')->group(function () {
            Route::get('/', [GroupController::class, 'index'])->name('index');
            Route::any('/create', [GroupController::class, 'create'])->name('create');
            Route::get('/{id}', [GroupController::class, 'view'])->name('view');
            Route::any('/edit/{id}', [GroupController::class, 'edit'])->name('edit');
            Route::get('/status/{id}', [GroupController::class, 'status'])->name('status');
            Route::get('/delete/{id}', [GroupController::class, 'delete'])->name('delete');
        });

        Route::prefix('courts')->name('courts.')->group(function () {
            Route::get('/club-courts/{club_id}', [CourtController::class, 'index'])->name('index');
            Route::any('/create', [CourtController::class, 'create'])->name('create');
            Route::any('/edit/{id}', [CourtController::class, 'edit'])->name('edit');
            Route::get('/status/{id}', [CourtController::class, 'status'])->name('status');
            Route::get('/delete/{id}', [CourtController::class, 'delete'])->name('delete');
        });

        Route::prefix('posts')->name('posts.')->group(function () {
            Route::get('/', [PostsController::class, 'index'])->name('index');
            Route::get('/{id}', [PostsController::class, 'view'])->name('view');
            Route::get('/delete/{id}', [PostsController::class, 'delete'])->name('delete');
        });

        Route::prefix('comments')->name('comments.')->group(function () {
            Route::get('/post-comments/{post_id}', [CommentController::class, 'index'])->name('index');
            Route::get('/{id}', [CommentController::class, 'view'])->name('view');
            Route::get('/delete/{id}', [CommentController::class, 'delete'])->name('delete');
        });

        Route::prefix('reservations')->name('reservations.')->group(function () {
            Route::get('/', [ReservationController::class, 'index'])->name('index');
            Route::any('/create', [ReservationController::class, 'create'])->name('create');
            Route::get('/{id}', [ReservationController::class, 'view'])->name('view');
            Route::any('/edit/{id}', [ReservationController::class, 'edit'])->name('edit');
            Route::get('/status/{id}', [ReservationController::class, 'status'])->name('status');
            Route::get('/delete/{id}', [ReservationController::class, 'delete'])->name('delete');
        });

        Route::prefix('invitations')->name('invitations.')->group(function () {
            Route::get('/', [InvitationsController::class, 'index'])->name('index');
            Route::any('/create', [InvitationsController::class, 'create'])->name('create');
            Route::get('/{id}', [InvitationsController::class, 'view'])->name('view');
            Route::any('/edit/{id}', [InvitationsController::class, 'edit'])->name('edit');
            Route::get('/status/{id}', [InvitationsController::class, 'status'])->name('status');
            Route::get('/delete/{id}', [InvitationsController::class, 'delete'])->name('delete');
        });

        Route::prefix('tournaments')->name('tournaments.')->group(function () {
            Route::get('/', [TournamentController::class, 'index'])->name('index');
            Route::any('/create', [TournamentController::class, 'create'])->name('create');
            Route::any('/edit/{id}', [TournamentController::class, 'edit'])->name('edit');
            Route::get('/{id}', [TournamentController::class, 'view'])->name('view');
            Route::get('/status/{id}', [TournamentController::class, 'status'])->name('status');
            Route::get('/delete/{id}', [TournamentController::class, 'delete'])->name('delete');
        });

        Route::prefix('hours')->name('hours.')->group(function () {
            Route::get('/', [WorkingHoursController::class, 'index'])->name('index');
            Route::any('/create', [WorkingHoursController::class, 'create'])->name('create');
            Route::any('/edit/{id}', [WorkingHoursController::class, 'edit'])->name('edit');
            Route::get('/delete/{id}', [WorkingHoursController::class, 'delete'])->name('delete');
        });

        Route::prefix('events')->name('events.')->group(function () {
            Route::get('/', [EventController::class, 'index'])->name('index');
            Route::any('/create', [EventController::class, 'create'])->name('create');
            Route::any('/edit/{id}', [EventController::class, 'edit'])->name('edit');
            Route::get('/delete/{id}', [EventController::class, 'delete'])->name('delete');
        });

        Route::prefix('ads')->name('ads.')->group(function () {
            Route::get('/', [UserAdsController::class, 'index'])->name('index');
            Route::get('/status/{id}', [UserAdsController::class, 'status'])->name('status');
            Route::get('/{id}', [UserAdsController::class, 'view'])->name('view');
            Route::get('/delete/{id}', [UserAdsController::class, 'delete'])->name('delete');
        });

        Route::prefix('contact')->name('contact.')->group(function () {
            Route::any('/', [FeedbacksController::class, 'index'])->name('index');
        });

        Route::prefix('cms')->name('cms.')->group(function () {
            Route::any('/', [ContentController::class, 'cms'])->name('edit');
        });

        Route::prefix('activities')->name('activities.')->group(function () {
            Route::any('/', [ActivityController::class, 'index'])->name('index');
        });

        Route::prefix('announcements')->name('announcements.')->group(function () {
            Route::any('/', [AnnouncementsController::class, 'index'])->name('index');
            Route::any('/create', [AnnouncementsController::class, 'create'])->name('create');
            Route::get('/delete/{id}', [AnnouncementsController::class, 'delete'])->name('delete');
        });

        Route::prefix('devices')->name('devices.')->group(function () {
            Route::any('/', [UserDeviceController::class, 'index'])->name('index');
        });
        
        Route::prefix('roles')->name('roles.')->group(function () {
            Route::get('/', [RoleController::class, 'index'])->name('index');
            Route::any('/edit/{id}', [RoleController::class, 'edit'])->name('edit');
            Route::any('/create', [RoleController::class, 'create'])->name('create');
            Route::get('/delete/{id}', [RoleController::class, 'delete'])->name('delete');
        });
    });
});

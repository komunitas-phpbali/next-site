<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\UserController;

Route::get('/', [HomeController::class, 'index']);

// Reservation
Route::get('register/{provider}', [ReservationController::class, 'doReservation']);

// Event
Route::get('events', [EventController::class, 'index']);

// About
Route::get('about', [AboutController::class, 'index']);

// Oauth Github
Route::get('login/{provider}', [AuthController::class, 'redirectToProvider'])->name('login');
Route::get('login/{provider}/callback/{events?}/{event_slug?}', [AuthController::class, 'handleProviderCallback']);

Route::post('logout', [AuthController::class, 'logout']);

Route::middleware(['auth'])->group(function () {

    // Event and topics
    Route::middleware(['admin'])->group(function () {
        Route::get('events/create', [EventController::class, 'create']);
        Route::post('events/store', [EventController::class, 'store']);
        Route::get('events/{event}/edit', [EventController::class, 'edit']);
        Route::put('events/{event}/update', [EventController::class, 'update']);
        Route::put('events/{event}/publish', [EventController::class, 'publish']);
        Route::put('events/{event}/unpublish', [EventController::class, 'unpublish']);
        Route::delete('events/{event}', [EventController::class, 'destroy']);

        Route::get('events/{event}/topics/create', [TopicController::class, 'create']);
        Route::post('events/{event}/topics/store', [TopicController::class, 'store']);
        Route::get('events/{event}/topics/{topic}/edit', [TopicController::class, 'edit'])->name('topic.edit');
        Route::put('events/{event}/topics/{topic}/update', [TopicController::class, 'update'])->name('topic.update');
        Route::delete('events/{event}/topics/{topic}', [TopicController::class, 'destroy'])->name('topic.destroy');

        Route::get('users', [UserController::class, 'index']);
        Route::get('users/create', [UserController::class, 'create']);
        Route::post('users/store', [UserController::class, 'store']);
        Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::put('users/{user}/update', [UserController::class, 'update']);
        Route::delete('users/{user}', [UserController::class, 'destroy']);
    });

    // Register event for authenticated user
    Route::put('events/{event}/register', [EventController::class, 'register']);

    // Attendee
    Route::middleware(['admin', 'staff'])->group(function () {
        Route::get('events/{event}/attendees/create', [AttendeeController::class, 'create']);
        Route::post('events/{event}/attendees/store', [AttendeeController::class, 'store']);
        Route::post('events/{event}/attendees/attendance', [AttendeeController::class, 'attendance']);
    });
});

// Fixed bug cannot create and store event. I think because Laravel read route sequentially.
Route::get('events/{event}', [EventController::class, 'show']);
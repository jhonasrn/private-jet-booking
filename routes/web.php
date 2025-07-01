<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminReservationController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\Reports\FlightReportController;
use App\Http\Controllers\Pilot\PilotDashboardController;
use App\Http\Controllers\Pilot\PilotReservationController;
use App\Http\Controllers\Client\ClientDashboardController;
use App\Http\Controllers\Client\ClientReservationController;
use Illuminate\Http\Request;
use App\Http\Controllers\PublicRegistrationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public Routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Auth-related (e.g. Laravel Breeze handles /register internally)
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware(['auth'])->name('verification.notice');

// Admin Routes
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

        // Reservation Management
        Route::get('/reservations', [AdminReservationController::class, 'index'])->name('reservations.index');
        Route::get('/reservations/all', [AdminReservationController::class, 'all'])->name('reservations.all');
        Route::put('/reservations/{reservation}/assign', [AdminReservationController::class, 'assign'])->name('reservations.assign');

        // User Management
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

        // Reports
        Route::prefix('reports')->name('reports.')->group(function () {
            Route::get('/completed-flights', [FlightReportController::class, 'completed'])->name('completed');
            Route::get('/assigned-flights', [FlightReportController::class, 'assigned'])->name('assigned');
            Route::get('/summary', [FlightReportController::class, 'summary'])->name('summary');
        });
    });

// Pilot Routes
Route::middleware(['auth', 'role:pilot'])
    ->prefix('pilot')
    ->name('pilot.')
    ->group(function () {
        Route::get('/dashboard', [PilotDashboardController::class, 'index'])->name('dashboard');
        Route::get('/reservations', [PilotReservationController::class, 'index'])->name('reservations.index');
        Route::get('/reservations/completed', [PilotDashboardController::class, 'completed'])->name('reservations.completed');
        Route::get('/reservations/search', [PilotDashboardController::class, 'search'])->name('reservations.search');
        Route::patch('/reservations/{reservation}/update-status', [PilotReservationController::class, 'updateStatus'])->name('reservations.updateStatus');
    });

// Client Routes
Route::middleware(['auth', 'role:client'])
    ->prefix('client')
    ->name('client.')
    ->group(function () {
        Route::get('/dashboard', [ClientDashboardController::class, 'index'])->name('dashboard');
        Route::get('/reservations/create', [ClientReservationController::class, 'create'])->name('reservations.create');
        Route::post('/reservations', [ClientReservationController::class, 'store'])->name('reservations.store');
    });

// Shared Profile Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/request-user', [PublicRegistrationController::class, 'create'])->name('request-user.form');
Route::post('/request-user', [PublicRegistrationController::class, 'store'])->name('request-user.store');
Route::view('/request-confirmation', 'request-confirmation')->name('request-user.confirm');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminReservationController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Pilot\PilotDashboardController;
use App\Http\Controllers\Pilot\PilotReservationController;
use App\Http\Controllers\Client\ClientDashboardController;
use App\Http\Controllers\Client\ClientReservationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::redirect('/', '/login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


// Admin-only routes
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

        // Reservation management
        Route::get('/reservations', [AdminReservationController::class, 'index'])->name('reservations.index');
        Route::get('/reservations/all', [AdminReservationController::class, 'all'])->name('reservations.all');
        Route::put('/reservations/{reservation}/assign', [AdminReservationController::class, 'assign'])->name('reservations.assign');

        // User management
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    });

    // Pilot-only routes
Route::middleware(['auth', 'role:pilot'])
    ->prefix('pilot')
    ->name('pilot.')
    ->group(function () {
        Route::get('/dashboard', [PilotDashboardController::class, 'index'])->name('dashboard');
        Route::get('/reservations/completed', [PilotDashboardController::class, 'completed'])->name('reservations.completed');
        Route::patch('/reservations/{reservation}/update-status', [PilotReservationController::class, 'updateStatus'])->name('reservations.updateStatus');
    });

    // Client-only routes
Route::middleware(['auth', 'role:client'])
    ->prefix('client')
    ->name('client.')
    ->group(function () {
        Route::get('/dashboard', [ClientDashboardController::class, 'index'])->name('dashboard');
        Route::get('/reservations/create', [ClientReservationController::class, 'create'])->name('reservations.create');
        Route::post('/reservations', [ClientReservationController::class, 'store'])->name('reservations.store');
    });

// Profile (shared)
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

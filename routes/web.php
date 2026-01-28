<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\Admin\UserController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

require __DIR__ . '/auth.php';

/*
|--------------------------------------------------------------------------
| Authenticated User Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // User dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // User features
    Route::get('/my-reservations', [ReservationController::class, 'myReservations'])
        ->name('reservations.my');

    Route::get('/notifications', [NotificationController::class, 'index'])
        ->name('notifications.index');

    Route::get('/reservation/create', [ReservationController::class, 'create'])
        ->name('reservation.create');

    Route::post('/reservation/store', [ReservationController::class, 'store'])
        ->name('reservation.store');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'isAdmin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [AdminController::class, 'index'])
            ->name('dashboard');

        Route::get('/users', [UserController::class, 'index'])
            ->name('users');
    });

/*
|--------------------------------------------------------------------------
| Manager Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'isManager'])
    ->prefix('manager')
    ->name('manager.')
    ->group(function () {

        Route::get('/dashboard', [ManagerController::class, 'index'])
            ->name('dashboard');

        Route::get('/resources', [ManagerController::class, 'resources'])
            ->name('resources');

        Route::post('/maintenance', [ManagerController::class, 'storeMaintenance'])
            ->name('maintenance.store');

        Route::patch('/maintenance/{id}/complete', [ManagerController::class, 'markAsCompleted'])
            ->name('maintenance.complete');

        Route::patch('/reservation/{id}/approve', [ManagerController::class, 'approveReservation'])
            ->name('reservation.approve');

        Route::patch('/reservation/{id}/reject', [ManagerController::class, 'rejectReservation'])
            ->name('reservation.reject');
    });

/*
|--------------------------------------------------------------------------
| Other Routes
|--------------------------------------------------------------------------
*/
Route::get('/products', [ProductController::class, 'index'])->name('resources.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

Route::get('/resources/category/{id}', [ResourceController::class, 'getProducts'])
    ->name('resources.byCategory');

Route::get('/incidents', [IncidentController::class, 'index']);
Route::get('/logs', [LogController::class, 'index']);

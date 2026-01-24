<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResourceController;
use App\Models\ResourceCategory;

// --- Routes publiques ---
Route::get('/', function () {
    return view('welcome');
});


// PROTECTED ROUTES (Requires Login)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // ... admin/manager routes
});

// --- Auth routes (login/register/etc.) ---
require __DIR__ . '/auth.php';

// --- Dashboard utilisateur (interne) ---
Route::middleware(['auth', 'isUser'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// --- Profil (tout utilisateur connecté) ---
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// --- Admin ---
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
});

// Public Products Page (Teal Design)
Route::get('/products', [ProductController::class, 'index'])->name('resources.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

// AJAX
Route::get('/resources/category/{id}', [ResourceController::class, 'getProducts'])
    ->name('resources.byCategory');

Route::middleware(['auth', 'isManager'])->group(function () {
    Route::get('/manager/dashboard', [ManagerController::class, 'index'])->name('manager.dashboard');
    Route::get('/manager/resources', [ResourceController::class, 'index'])->name('manager.resources');
});

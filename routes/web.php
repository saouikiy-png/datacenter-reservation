<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerController;
use Illuminate\Support\Facades\Route;

// --- Routes publiques ---
Route::get('/', function () {
    return view('welcome'); // Page accessible aux invités
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

// --- Manager ---
Route::middleware(['auth', 'isManager'])->group(function () {
    Route::get('/manager/dashboard', [ManagerController::class, 'index'])->name('manager.dashboard');
    Route::get('/manager/resources', [ManagerController::class, 'resources'])->name('manager.resources');
});


//ikram
use App\Http\Controllers\ReservationController;

// Page d'accueil (ou liste des ressources)
Route::get('/', function () {
    return view('welcome'); // Ou redirect vers page ressources si tu as une page dédiée
});

// Afficher le formulaire de réservation pour une ressource
Route::get('/reservation/create', [ReservationController::class, 'create'])
    ->name('reservation.create');

// Enregistrer la réservation
Route::post('/reservation/store', [ReservationController::class, 'store'])
    ->name('reservation.store');
//route au dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//ikram-profile
Route::get('/profile', [ProfileController::class, 'index'])
    ->middleware('auth')
    ->name('profile');     //ça te permet de l’appeler facilement dans Blade 

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResourceController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('resources', ResourceController::class)
    ->middleware('auth');

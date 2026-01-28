<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResourceController;

Route::get('/categories/{id}/products', function ($id) {
    return \App\Models\Resource::where('category_id', $id)->get();
});



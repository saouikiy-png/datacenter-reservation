<?php

use Illuminate\Support\Facades\Route;
use App\Models\Resource;
use App\Models\ResourceCategory;

Route::get('/categories/{category}/resources', function ($categoryId) {
    return Resource::where('category_id', $categoryId)->get();
});

Route::get('/resources/{resource}', function ($id) {
    return Resource::find($id);
});
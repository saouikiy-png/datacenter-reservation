<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resource;
use App\Models\ResourceCategory;

class ResourceController extends Controller
{
    public function index()
{
    $categories = ResourceCategory::with('resources')->get();
    return view('resources', compact('categories'));
}

    public function show(Resource $resource)
    {
        return view('resources.show', compact('resource'));
    }
}

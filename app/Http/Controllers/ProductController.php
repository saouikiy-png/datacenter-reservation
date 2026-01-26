<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResourceCategory;
use App\Models\Resource;

class ProductController extends Controller
{
    /**
     * Display the list of products grouped by category.
     */
    public function index()
    {
        // Get all categories and their associated resources
        $categories = ResourceCategory::with('resources')->get();
        return view('products.index', compact('categories'));
    }

    /**
     * Display a specific product detail page.
     */
    public function show($id)
    {
        // Find the resource by ID or fail with 404
        $resource = Resource::findOrFail($id);
        return view('products.show', compact('resource'));
    }
}

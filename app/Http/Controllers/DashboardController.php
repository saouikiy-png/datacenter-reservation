<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResourceCategory;

class DashboardController extends Controller
{
    public function index()
    {
        $categories = ResourceCategory::with('resources')->get();
        return view('dashboard', compact('categories'));
    }
}

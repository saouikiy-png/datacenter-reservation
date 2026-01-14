<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard'); // Admin dashboard
    }

    public function users()
    {
        return view('admin.users'); // Admin manages users
    }
}


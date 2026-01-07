<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function index()
    {
        return view('manager.dashboard'); // Correct view for manager
    }

    public function resources()
    {
        return view('manager.resources'); // Manager’s resource page
    }
}

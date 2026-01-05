<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function index()
    {
        return view('admin.dashboard'); // Vue admin
    }

    public function users()
    {
        return view('admin.users'); // Liste des utilisateurs
    }
}

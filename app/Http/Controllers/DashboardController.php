<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $notificationsCount = Notification::where('user_id', $user->id)->count();

        $reservationsCount = Reservation::where('user_id', $user->id)->count();

        return view('dashboard', compact(
            'notificationsCount',
            'reservationsCount'
        ));
    }


}


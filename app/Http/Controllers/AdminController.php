<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Resource;
use App\Models\Incident;
use App\Models\Log;

class AdminController extends Controller
{
    public function index()
    {
        $usersCount = User::count();
        $resourcesCount = Resource::count();
        $incidentsCount = Incident::count();
        $logs = Log::latest()->limit(5)->get();

        $activityChart = [
            'dates' => [],
            'users' => [],
            'resources' => [],
            'incidents' => []
        ];

        for ($i = 6; $i >= 0; $i--) {
            $day = now()->subDays($i)->format('Y-m-d');
            $activityChart['dates'][] = $day;
            $activityChart['users'][] = User::whereDate('created_at', $day)->count();
            $activityChart['resources'][] = Resource::whereDate('created_at', $day)->count();
            $activityChart['incidents'][] = Incident::whereDate('created_at', $day)->count();
        }

        return view('admin.dashboard', compact(
            'usersCount',
            'resourcesCount',
            'incidentsCount',
            'logs',
            'activityChart'
        ));
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }
}

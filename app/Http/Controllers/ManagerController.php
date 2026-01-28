<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use App\Models\Maintenance;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Log;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;


class ManagerController extends Controller
{
    public function index()
    {
        $totalResources = Resource::count();
        $underMaintenance = Resource::where('status', 'maintenance')->count();
        $activeMaintenances = Maintenance::where('status', '!=', 'completed')
            ->with('resource')
            ->get();

        $pendingReservations = Reservation::where('status', 'pending')
            ->with(['user', 'resource'])
            ->get();

        $resources = Resource::all();


        return view('manager.dashboard', compact(
            'totalResources',
            'underMaintenance',
            'activeMaintenances',
            'resources',
            'pendingReservations'
        ));
    }

    public function approveReservation($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->update(['status' => 'approved']);
        Log::create([
            'action' => 'Reservation Approved',
            'user_id' => Auth::id(),
            'description' => 'Reservation ID: ' . $reservation->id
        ]);

        Notification::create([
            'user_id' => $reservation->user_id,
            'message' => 'Your reservation has been approved',
            'type' => 'reservation'
        ]);

        return redirect()->back()->with('success', 'Reservation approved successfully.');
    }

    public function rejectReservation($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->update(['status' => 'rejected']);
        Log::create([
            'action' => 'Reservation Rejected',
            'user_id' => Auth::id(),
            'description' => 'Reservation ID: ' . $reservation->id
        ]);

        Notification::create([
            'user_id' => $reservation->user_id,
            'message' => 'Your reservation has been rejected',
            'type' => 'reservation'
        ]);

        return redirect()->back()->with('success', 'Reservation rejected.');
    }

    public function storeMaintenance(Request $request)
    {
        $request->validate([
            'resource_id' => 'required|exists:resources,id',
            'description' => 'nullable|string',
            'reservation_date' => 'required|date',
            'return_date' => 'nullable|date|after_or_equal:reservation_date',
        ]);

        Maintenance::create([
            'resource_id' => $request->resource_id,
            'description' => $request->description,
            'reservation_date' => $request->reservation_date,
            'return_date' => $request->return_date,
            'status' => 'planned' // or 'ongoing' depending on need, default is planned
        ]);
        Log::create([
            'action' => 'Maintenance Scheduled',
            'user_id' => Auth::id(),
            'description' => 'Maintenance created'
        ]);

        Notification::create([
            'user_id' => Auth::id(),
            'message' => 'Maintenance scheduled successfully',
            'type' => 'maintenance'
        ]);

        // Optionally update resource status
        $resource = Resource::find($request->resource_id);
        $resource->update(['status' => 'maintenance']);

        return redirect()->back()->with('success', 'Maintenance scheduled successfully.');
    }

    public function markAsCompleted($id)
    {
        $maintenance = Maintenance::findOrFail($id);
        $maintenance->update(['status' => 'completed', 'return_date' => now()]);

        // Restore resource status
        $maintenance->resource->update(['status' => 'available']);

        return redirect()->back()->with('success', 'Maintenance marked as completed.');
    }
}

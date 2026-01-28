<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Resource;
use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\Log;
use App\Models\Incident;
use Illuminate\Support\Facades\Auth;


class ReservationController extends Controller
{
    // Page création réservation
    public function create(Request $request)
    {
        $resource_id = $request->query('resource_id');
        $resource = Resource::findOrFail($resource_id);

        // Dates déjà réservées pour cette ressource
        $existingReservations = Reservation::where('resource_id', $resource_id)
            ->where('status', '!=', 'refusee')
            ->get(['reservation_date', 'return_date']);

        return view('reservation.create', compact('resource', 'existingReservations'));
    }

    // Enregistrer réservation
    public function store(Request $request)
    {
        $request->validate([
            'resource_id' => 'required|exists:resources,id',
            'reservation_date' => 'required|date|after_or_equal:today',
            'return_date' => 'required|date|after:reservation_date',
            'justification' => 'required|string',
        ]);

        try {

            // Vérifier qu'il n'y a pas de conflit de dates
            $conflict = Reservation::where('resource_id', $request->resource_id)
                ->where('status', '!=', 'rejected')
                ->where(function ($query) use ($request) {
                    $query->whereBetween('reservation_date', [$request->reservation_date, $request->return_date])
                        ->orWhereBetween('return_date', [$request->reservation_date, $request->return_date])
                        ->orWhere(function ($q) use ($request) {
                            $q->where('reservation_date', '<', $request->reservation_date)
                                ->where('return_date', '>', $request->return_date);
                        });
                })->exists();

            if ($conflict) {
                return back()->withErrors(['date' => 'This resource is already reserved during this period.'])->withInput();
            }

            // Create Reservation
            $reservation = Reservation::create([
                'user_id' => Auth::id(),
                'resource_id' => $request->resource_id,
                'reservation_date' => $request->reservation_date,
                'return_date' => $request->return_date,
                'justification' => $request->justification,
            ]);

            // Log system event
            Log::create([
                'action' => 'Reservation Created',
                'user_id' => Auth::id(),
                'description' => 'Reservation ID: ' . $reservation->id
            ]);

            // Notify Managers
            $managers = \App\Models\User::where('role_id', 2)->get();

            foreach ($managers as $manager) {
                Notification::create([
                    'user_id' => $manager->id,
                    'message' => 'New reservation created by user #' . Auth::id(),
                    'type' => 'reservation'
                ]);
            }

            return redirect()->route('dashboard')->with('success', 'Reservation successfully created!');

        } catch (\Exception $e) {

            // Incident logging
            Incident::create([
                'user_id' => Auth::id(),
                'title' => 'Reservation Error',
                'description' => $e->getMessage(),
                'status' => Incident::STATUS_OPEN
            ]);


            return back()->withErrors(['error' => 'An unexpected error occurred.']);
        }
    }
    public function myReservations()
    {
        $reservations = Reservation::where('user_id', Auth::id())
            ->with('resource')
            ->latest()
            ->get();

        return view('reservation.my', compact('reservations'));
    }

}
?>
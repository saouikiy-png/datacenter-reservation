<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Resource;
use Illuminate\Http\Request;

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
            ->get(['start_date', 'end_date']);

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
            return back()->withErrors(['date' => 'This resource is already reserved for the selected dates.'])->withInput();
        }

        Reservation::create([
            'user_id' => auth()->id(),
            'resource_id' => $request->resource_id,
            'reservation_date' => $request->reservation_date,
            'return_date' => $request->return_date,
            'justification' => $request->justification,
        ]);

        return redirect()->route('dashboard')->with('success', 'Reservation successfully created!');
    }
}

?>
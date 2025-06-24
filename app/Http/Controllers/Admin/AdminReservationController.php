<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class AdminReservationController extends Controller
{
    /**
     * Displays the full list of reservations.
     */
    public function index()
    {
        $reservations = Reservation::with(['user', 'pilot', 'jet'])->latest()->get();

        return view('admin.reservations.index', compact('reservations'));
    }

    /**
     * Assigns a pilot to a reservation and updates its status.
     */
    public function assign(Request $request, Reservation $reservation)
    {
        $request->validate([
            'pilot_id' => 'required|exists:users,id',
        ]);

        $reservation->update([
            'pilot_id' => $request->pilot_id,
            'status' => 'assigned', // ← status updated on assignment
        ]);

        return back()->with('success', 'Pilot successfully assigned and status updated.');
    }
}

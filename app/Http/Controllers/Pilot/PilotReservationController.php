<?php

namespace App\Http\Controllers\Pilot;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class PilotReservationController extends Controller
{
    public function updateStatus(Request $request, Reservation $reservation)
    {
        if ($reservation->pilot_id !== Auth::id()) {
            abort(403);
        }

        $status = match ($reservation->status) {
            'assigned' => 'in_progress',
            'in_progress' => 'completed',
            default => $reservation->status,
        };

        $reservation->update(['status' => $status]);

        return back()->with('success', 'Status atualizado para "' . $status . '"');
    }
}

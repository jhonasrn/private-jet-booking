<?php

namespace App\Http\Controllers\Pilot;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;

class PilotDashboardController extends Controller
{
    public function index()
    {
        $assignedReservations = Reservation::where('pilot_id', Auth::id())
            ->where('status', 'assigned')
            ->with(['user', 'jet'])
            ->latest()
            ->get();

        $inProgressReservations = Reservation::where('pilot_id', Auth::id())
            ->where('status', 'in_progress')
            ->with(['user', 'jet'])
            ->latest()
            ->get();

        return view('pilot.dashboard', compact('assignedReservations', 'inProgressReservations'));
    }

    public function completed()
    {
        $completedReservations = Reservation::where('pilot_id', Auth::id())
            ->where('status', 'completed')
            ->latest()
            ->get();

        return view('pilot.reservations.completed', compact('completedReservations'));
    }
}

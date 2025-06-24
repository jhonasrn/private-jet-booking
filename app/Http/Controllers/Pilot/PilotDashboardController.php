<?php

namespace App\Http\Controllers\Pilot;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;

class PilotDashboardController extends Controller
{
    public function index()
    {
        $activeReservations = Reservation::where('pilot_id', Auth::id())
            ->where('status', 'assigned') // ou 'in_progress', se estiver usando esse status
            ->latest()
            ->get();

        return view('pilot.dashboard', compact('activeReservations'));
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

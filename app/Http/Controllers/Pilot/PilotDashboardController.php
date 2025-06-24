<?php

namespace App\Http\Controllers\Pilot;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\User;

class PilotDashboardController extends Controller
{
    public function index()
    {
        $pendingReservations = Reservation::whereNull('pilot_id')->latest()->get();
        $pilots = User::where('role', 'pilot')->get();

        return view('admin.dashboard', compact('pendingReservations', 'pilots'));
    }
}
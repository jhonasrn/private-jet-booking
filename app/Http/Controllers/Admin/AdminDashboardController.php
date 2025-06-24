<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
        public function index()
    {
        $pendingReservations = Reservation::whereNull('pilot_id')->latest()->get();
        $pilots = \App\Models\User::where('role', 'pilot')->get();

        return view('admin.dashboard', compact('pendingReservations', 'pilots'));
    }
}

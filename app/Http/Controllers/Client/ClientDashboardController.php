<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use App\Models\Jet;

class ClientDashboardController extends Controller
{
    public function index()
    {
        $reservations = auth()->user()
            ->reservations()
            ->with('jet')
            ->latest()
            ->get();

        return view('client.dashboard', compact('reservations'));
    }
}
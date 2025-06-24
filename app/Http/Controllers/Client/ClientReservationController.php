<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Jet;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class ClientReservationController extends Controller
{
    public function create()
    {
        $jets = Jet::all();
        return view('client.reservations.create', compact('jets'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'jet_id' => 'required|exists:jets,id',
            'origin' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'departure_date' => 'required|date',
            'arrival_date' => 'required|date|after_or_equal:departure_date',
        ]);

        Reservation::create([
            'user_id' => Auth::id(),
            'jet_id' => $request->jet_id,
            'origin' => $request->origin,
            'destination' => $request->destination,
            'departure_date' => $request->departure_date,
            'arrival_date' => $request->arrival_date,
            'status' => 'pending',
        ]);

        return redirect()->route('client.dashboard')->with('success', 'Reservation submitted!');
    }
}

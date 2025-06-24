<?php

namespace App\Http\Controllers\Pilot;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;

class PilotDashboardController extends Controller
{
    // Dashboard do piloto
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

    // Reservas concluídas
    public function completed()
    {
        $completedReservations = Reservation::where('pilot_id', Auth::id())
            ->where('status', 'completed')
            ->latest()
            ->get();

        return view('pilot.reservations.completed', compact('completedReservations'));
    }

    // Busca por ID de reserva (via formulário de busca)
    public function search(Request $request)
    {
        $reservation = Reservation::where('pilot_id', Auth::id())
            ->where('id', $request->reservation_id)
            ->with(['user', 'jet'])
            ->first();

        return view('pilot.reservations.search_result', compact('reservation'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class AdminReservationController extends Controller
{
    /**
     * Atualiza o status da reserva para "assigned" com o piloto escolhido.
     */
    public function assign(Request $request, Reservation $reservation)
    {
        $request->validate([
            'pilot_id' => 'required|exists:users,id',
        ]);

        $reservation->update([
            'pilot_id' => $request->pilot_id,
            'status' => 'assigned',
        ]);

        return back()->with('success', 'Pilot successfully assigned and status updated.');
    }

    /**
     * Exibe todas as reservas do sistema, com cliente, piloto e jato.
     */
    public function all()
    {
        $allReservations = Reservation::with(['user', 'pilot', 'jet'])->latest()->get();

        return view('admin.reservations.all', compact('allReservations'));
    }
}

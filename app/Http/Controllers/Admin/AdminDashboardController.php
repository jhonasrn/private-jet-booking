<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Carrega todas as reservas sem piloto, com cliente e jato
        $pendingReservations = Reservation::with(['user', 'jet'])
            ->whereNull('pilot_id')
            ->latest()
            ->get();

        // Lista de pilotos disponíveis
        $pilots = User::where('role', 'pilot')->get();

        return view('admin.dashboard', compact('pendingReservations', 'pilots'));
    }
}

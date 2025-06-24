<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class FlightReportController extends Controller
{
    public function completed()
    {
        $groupedTotals = DB::table('reservations')
            ->selectRaw('users.name as pilot_name, DATE_FORMAT(departure_date, "%Y-%m") as month, COUNT(*) as total')
            ->join('users', 'reservations.pilot_id', '=', 'users.id')
            ->where('status', 'completed')
            ->groupBy('users.name', 'month')
            ->orderByDesc('month')
            ->get()
            ->toArray();

        return view('admin.reports.completed', compact('groupedTotals'));
    }

    public function assigned()
    {
        $groupedTotals = DB::table('reservations')
            ->selectRaw('users.name as pilot_name, DATE_FORMAT(departure_date, "%Y-%m") as month, COUNT(*) as total')
            ->join('users', 'reservations.pilot_id', '=', 'users.id')
            ->where('status', 'assigned')
            ->groupBy('users.name', 'month')
            ->orderByDesc('month')
            ->get();

        return view('admin.reports.assigned', compact('groupedTotals'));
    }

    public function summary()
    {
        $completed = DB::table('reservations')
            ->selectRaw('users.name as pilot_name, DATE_FORMAT(departure_date, "%Y-%m") as month, COUNT(*) as total')
            ->join('users', 'reservations.pilot_id', '=', 'users.id')
            ->where('status', 'completed')
            ->groupBy('users.name', 'month')
            ->orderByDesc('month')
            ->get();

        $assigned = DB::table('reservations')
            ->selectRaw('users.name as pilot_name, DATE_FORMAT(departure_date, "%Y-%m") as month, COUNT(*) as total')
            ->join('users', 'reservations.pilot_id', '=', 'users.id')
            ->where('status', 'assigned')
            ->groupBy('users.name', 'month')
            ->orderByDesc('month')
            ->get();

        $byJet = DB::table('reservations')
            ->selectRaw('jets.model as jet_model, COUNT(*) as total')
            ->join('jets', 'reservations.jet_id', '=', 'jets.id')
            ->groupBy('jets.model')
            ->orderByDesc('total')
            ->get();

        $unassigned = DB::table('reservations')
            ->selectRaw('DATE_FORMAT(departure_date, "%Y-%m") as month, COUNT(*) as total')
            ->where(function ($query) {
                $query->whereNull('pilot_id')
                      ->orWhere('status', 'pending');
            })
            ->groupBy('month')
            ->orderByDesc('month')
            ->get();

        return view('admin.reports.summary', [
            'completedTotals' => $completed,
            'assignedTotals' => $assigned,
            'jetTotals' => $byJet,
            'unassignedTotals' => $unassigned,
        ]);
    }
}

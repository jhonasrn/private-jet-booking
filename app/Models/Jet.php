<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Reservation;

class Jet extends Model
{
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function create()
    {
        $jets = Jet::all();
        return view('client.reservations.create', compact('jets'));
    }
}



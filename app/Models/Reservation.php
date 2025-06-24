<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'user_id',
        'pilot_id',
        'jet_id',
        'origin',
        'destination',
        'departure_date',
        'arrival_date',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jet()
    {
        return $this->belongsTo(Jet::class);
    }

    public function assignedReservations()
    {
        return $this->hasMany(Reservation::class, 'pilot_id');
    }

    public function pilot()
    {
        return $this->belongsTo(User::class, 'pilot_id');
    }

}

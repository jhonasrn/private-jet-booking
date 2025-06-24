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

    /**
     * Get the user associated with the reservation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the jet associated with the reservation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jet()
    {
        return $this->belongsTo(Jet::class);
    }

    /**
     * Get the pilot associated with the reservation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pilot()
    {
        return $this->belongsTo(User::class, 'pilot_id');
    }

}

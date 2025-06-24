<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public const STATUSES = [
        'pending',
        'confirmed',
        'in_progress',
        'cancelled',
        'completed',
    ];

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
     * Check if the given status is valid.
     *
     * @param string $status
     * @return bool
     */
    public static function isValidStatus(string $status): bool
    {
        return in_array($status, self::STATUSES);
    }

    /**
     * User (client) who made the reservation.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Jet associated with the reservation.
     */
    public function jet()
    {
        return $this->belongsTo(Jet::class);
    }

    /**
     * Pilot assigned to the reservation.
     */
    public function pilot()
    {
        return $this->belongsTo(User::class, 'pilot_id');
    }
}

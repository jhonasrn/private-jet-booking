<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reservation;
use App\Models\User;
use App\Models\Jet;
use Illuminate\Support\Carbon;

class ReservationSeeder extends Seeder
{
    public function run(): void
    {
        $clients = User::where('role', 'client')->pluck('id');
        $jets = Jet::pluck('id');
        $origins = ['São Paulo', 'Rio de Janeiro', 'Brasília', 'Salvador', 'Fortaleza'];
        $destinations = ['Miami', 'Lisboa', 'Nova York', 'Londres', 'Buenos Aires'];

        foreach (range(1, 50) as $i) {
            Reservation::create([
                'user_id' => $clients->random(),
                'jet_id' => $jets->random(),
                'pilot_id' => null, // ou atribuir um piloto aleatório se quiser
                'origin' => fake()->randomElement($origins),
                'destination' => fake()->randomElement($destinations),
                'departure_date' => Carbon::now()->addDays(rand(1, 30)),
                'arrival_date' => Carbon::now()->addDays(rand(31, 60)),
                'status' => 'pending',
            ]);
        }
    }
}

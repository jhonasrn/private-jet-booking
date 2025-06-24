<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jet;

class JetSeeder extends Seeder
{
    public function run(): void
    {
        $jets = [
            ['model' => 'Gulfstream G650', 'manufacturer' => 'Gulfstream Aerospace'],
            ['model' => 'Embraer Phenom 300', 'manufacturer' => 'Embraer'],
            ['model' => 'Cessna Citation X', 'manufacturer' => 'Cessna'],
            ['model' => 'Bombardier Global 7500', 'manufacturer' => 'Bombardier'],
            ['model' => 'Dassault Falcon 8X', 'manufacturer' => 'Dassault Aviation'],
            ['model' => 'Learjet 75 Liberty', 'manufacturer' => 'Bombardier'],
            ['model' => 'HondaJet Elite II', 'manufacturer' => 'Honda Aircraft Company'],
            ['model' => 'Cessna Citation Latitude', 'manufacturer' => 'Cessna'],
            ['model' => 'Pilatus PC-24', 'manufacturer' => 'Pilatus Aircraft']
        ];

        foreach ($jets as $jet) {
            Jet::create([
                'model' => $jet['model'],
                'manufacturer' => $jet['manufacturer'],
                'capacity' => rand(6, 14),
                'range_km' => rand(4000, 12000),
            ]);
        }
    }
}

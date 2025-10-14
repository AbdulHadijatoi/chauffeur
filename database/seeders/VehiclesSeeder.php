<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehiclesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vehicles = [
            [
                'name' => 'Mercedes-Benz S-Class',
                'passengers' => 4,
                'luggage' => 3,
            ],
            [
                'name' => 'BMW 7 Series',
                'passengers' => 4,
                'luggage' => 3,
            ],
            [
                'name' => 'Audi A8',
                'passengers' => 4,
                'luggage' => 3,
            ],
        ];

        foreach ($vehicles as $vehicle) {
            Vehicle::create($vehicle);
        }
    }
}

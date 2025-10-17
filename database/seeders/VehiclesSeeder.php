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
                'description' => 'Luxury sedan with advanced features.',
                'passengers' => 4,
                'luggage' => 3,
            ],
            [
                'name' => 'BMW 7 Series',
                'description' => 'Premium sedan with cutting-edge technology.',
                'passengers' => 4,
                'luggage' => 3,
            ],
            [
                'name' => 'Audi A8',
                'description' => 'Luxury sedan with a spacious interior.',
                'passengers' => 4,
                'luggage' => 3,
            ],
        ];

        foreach ($vehicles as $vehicle) {
            Vehicle::create($vehicle);
        }
    }
}

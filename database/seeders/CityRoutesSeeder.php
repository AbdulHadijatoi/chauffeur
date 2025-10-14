<?php

namespace Database\Seeders;

use App\Models\CityRoute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CityRoutesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $routes = [
            [
                'from_city_id' => 1, // London
                'to_city_id' => 2, // New York (example route)
                'duration' => 480, // 8 hours
                'distance' => 5570.0, // km
            ],
            [
                'from_city_id' => 2, // New York
                'to_city_id' => 3, // Toronto
                'duration' => 360, // 6 hours
                'distance' => 550.0, // km
            ],
            [
                'from_city_id' => 3, // Toronto
                'to_city_id' => 1, // London (example route)
                'duration' => 540, // 9 hours
                'distance' => 5770.0, // km
            ],
        ];

        foreach ($routes as $route) {
            CityRoute::create($route);
        }
    }
}

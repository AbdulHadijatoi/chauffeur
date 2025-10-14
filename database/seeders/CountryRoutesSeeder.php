<?php

namespace Database\Seeders;

use App\Models\CountryRoute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountryRoutesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $routes = [
            [
                'from_country_id' => 1, // United Kingdom
                'to_country_id' => 2, // United States
                'duration' => 480, // 8 hours
                'distance' => 5570.0, // km
            ],
            [
                'from_country_id' => 2, // United States
                'to_country_id' => 3, // Canada
                'duration' => 360, // 6 hours
                'distance' => 550.0, // km
            ],
            [
                'from_country_id' => 3, // Canada
                'to_country_id' => 1, // United Kingdom
                'duration' => 540, // 9 hours
                'distance' => 5770.0, // km
            ],
        ];

        foreach ($routes as $route) {
            CountryRoute::create($route);
        }
    }
}

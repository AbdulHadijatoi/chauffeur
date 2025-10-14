<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            [
                'name' => 'London',
                'country_id' => 1, // United Kingdom
            ],
            [
                'name' => 'New York',
                'country_id' => 2, // United States
            ],
            [
                'name' => 'Toronto',
                'country_id' => 3, // Canada
            ],
        ];

        foreach ($cities as $city) {
            City::create($city);
        }
    }
}

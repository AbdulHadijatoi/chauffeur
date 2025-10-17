<?php

namespace Database\Seeders;

use App\Models\ServicesCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicesCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Chauffeur Service',
                'description' => 'Professional chauffeur services for all occasions.',
            ],
            [
                'name' => 'Airport Transfer',
                'description' => 'Reliable airport transfer services to and from the airport.',
            ],
            [
                'name' => 'City-to-City Ride',
                'description' => 'Convenient city-to-city ride services for long-distance travel.',
            ],
        ];

        foreach ($categories as $category) {
            ServicesCategory::create($category);
        }
    }
}

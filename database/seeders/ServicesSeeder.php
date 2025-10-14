<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'Airport Transfer Service',
                'vehicle_id' => 1, // Mercedes-Benz S-Class
                'description' => 'Professional airport transfer service with luxury vehicles and experienced chauffeurs.',
            ],
            [
                'name' => 'City Tour Service',
                'vehicle_id' => 2, // BMW 7 Series
                'description' => 'Explore the city in comfort and style with our guided tour service.',
            ],
            [
                'name' => 'Wedding Service',
                'vehicle_id' => 3, // Audi A8
                'description' => 'Make your special day even more memorable with our wedding transportation service.',
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}

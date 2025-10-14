<?php

namespace Database\Seeders;

use App\Models\ServiceType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $serviceTypes = [
            [
                'service_id' => 1, // Airport Transfer Service
                'hour_duration' => 2,
                'price' => 150.00,
            ],
            [
                'service_id' => 2, // City Tour Service
                'hour_duration' => 4,
                'price' => 300.00,
            ],
            [
                'service_id' => 3, // Wedding Service
                'hour_duration' => 8,
                'price' => 600.00,
            ],
        ];

        foreach ($serviceTypes as $serviceType) {
            ServiceType::create($serviceType);
        }
    }
}

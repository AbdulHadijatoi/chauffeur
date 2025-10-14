<?php

namespace Database\Seeders;

use App\Models\VehicleSpec;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleSpecsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specs = [
            [
                'vehicle_id' => 1, // Mercedes-Benz S-Class
                'transmission' => '9-Speed Automatic',
                'mileage' => '25 MPG City / 32 MPG Highway',
                'steering' => 'Power Steering',
                'fuel_type' => 'Gasoline',
                'engine' => '3.0L V6 Turbo',
                'power' => '362 HP',
                'torque' => '369 lb-ft',
                'acceleration' => '5.0 seconds 0-60 mph',
                'top_speed' => '130 mph',
                'fuel_capacity' => '21.1 gallons',
                'weight' => '4,680 lbs',
                'length' => '208.2 inches',
                'width' => '76.9 inches',
                'height' => '59.2 inches',
                'wheelbase' => '126.4 inches',
                'ground_clearance' => '5.1 inches',
                'turning_radius' => '41.7 feet',
                'boot_space' => '16.3 cubic feet',
                'air_conditioning' => 'Tri-Zone Climate Control',
                'infotainment' => 'MBUX System with 12.3" Display',
                'safety_features' => 'Active Brake Assist, Blind Spot Assist',
                'comfort_features' => 'Heated & Ventilated Seats, Massage Function',
            ],
            [
                'vehicle_id' => 2, // BMW 7 Series
                'transmission' => '8-Speed Automatic',
                'mileage' => '22 MPG City / 29 MPG Highway',
                'steering' => 'Power Steering',
                'fuel_type' => 'Gasoline',
                'engine' => '3.0L Twin-Turbo I6',
                'power' => '335 HP',
                'torque' => '330 lb-ft',
                'acceleration' => '5.1 seconds 0-60 mph',
                'top_speed' => '130 mph',
                'fuel_capacity' => '20.6 gallons',
                'weight' => '4,430 lbs',
                'length' => '207.4 inches',
                'width' => '74.9 inches',
                'height' => '58.2 inches',
                'wheelbase' => '126.4 inches',
                'ground_clearance' => '5.3 inches',
                'turning_radius' => '42.3 feet',
                'boot_space' => '18.2 cubic feet',
                'air_conditioning' => '4-Zone Climate Control',
                'infotainment' => 'iDrive 7.0 with 10.25" Display',
                'safety_features' => 'Active Driving Assistant, Lane Departure Warning',
                'comfort_features' => 'Executive Lounge Seating, Panoramic Sky Lounge',
            ],
            [
                'vehicle_id' => 3, // Audi A8
                'transmission' => '8-Speed Automatic',
                'mileage' => '18 MPG City / 27 MPG Highway',
                'steering' => 'Power Steering',
                'fuel_type' => 'Gasoline',
                'engine' => '3.0L V6 Turbo',
                'power' => '335 HP',
                'torque' => '369 lb-ft',
                'acceleration' => '5.2 seconds 0-60 mph',
                'top_speed' => '130 mph',
                'fuel_capacity' => '21.7 gallons',
                'weight' => '4,519 lbs',
                'length' => '208.7 inches',
                'width' => '76.6 inches',
                'height' => '58.5 inches',
                'wheelbase' => '123.1 inches',
                'ground_clearance' => '4.9 inches',
                'turning_radius' => '40.7 feet',
                'boot_space' => '13.0 cubic feet',
                'air_conditioning' => '4-Zone Climate Control',
                'infotainment' => 'MMI Touch Response with Dual Displays',
                'safety_features' => 'Audi Pre Sense, Adaptive Cruise Control',
                'comfort_features' => 'Valcona Leather Seats, Bang & Olufsen Sound',
            ],
        ];

        foreach ($specs as $spec) {
            VehicleSpec::create($spec);
        }
    }
}

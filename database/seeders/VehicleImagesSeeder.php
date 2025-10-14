<?php

namespace Database\Seeders;

use App\Models\VehicleImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = [
            [
                'vehicle_id' => 1, // Mercedes-Benz S-Class
                'file_id' => 'uploads/vehicles/mercedes-s-class.jpg',
            ],
            [
                'vehicle_id' => 2, // BMW 7 Series
                'file_id' => 'uploads/vehicles/bmw-7-series.jpg',
            ],
            [
                'vehicle_id' => 3, // Audi A8
                'file_id' => 'uploads/vehicles/audi-a8.jpg',
            ],
        ];

        foreach ($images as $image) {
            VehicleImage::create($image);
        }
    }
}

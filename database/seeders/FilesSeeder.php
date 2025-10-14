<?php

namespace Database\Seeders;

use App\Models\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $files = [
            [
                'path' => 'uploads/vehicles/mercedes-s-class.jpg',
                'type' => 'image/jpeg',
            ],
            [
                'path' => 'uploads/vehicles/bmw-7-series.jpg',
                'type' => 'image/jpeg',
            ],
            [
                'path' => 'uploads/vehicles/audi-a8.jpg',
                'type' => 'image/jpeg',
            ],
        ];

        foreach ($files as $file) {
            File::create($file);
        }
    }
}

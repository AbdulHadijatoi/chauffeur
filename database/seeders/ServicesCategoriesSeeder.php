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
                'name' => 'Airport Transfer',
            ],
            [
                'name' => 'City Tour',
            ],
            [
                'name' => 'Wedding Service',
            ],
        ];

        foreach ($categories as $category) {
            ServicesCategory::create($category);
        }
    }
}

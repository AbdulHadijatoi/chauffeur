<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Run all seeders in order
        $this->call([
            AdminUserSeeder::class,
            SettingsSeeder::class,
            GuidelinesSeeder::class,
            FilesSeeder::class,
            ServicesCategoriesSeeder::class,
            CountriesSeeder::class,
            CitiesSeeder::class,
            CityRoutesSeeder::class,
            CountryRoutesSeeder::class,
            VehicleTypesSeeder::class,
            LocationsSeeder::class,
            VehiclesSeeder::class,
            VehicleImagesSeeder::class,
            ServicesSeeder::class,
            ServiceTypesSeeder::class,
            QuotesSeeder::class,
        ]);
    }
}

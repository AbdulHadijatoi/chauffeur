<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@chauffeurservices.com'],
            [
                'name' => 'Admin User',
                'email' => 'admin@chauffeurservices.com',
                'password' => Hash::make('password123'),
                'phone' => '+1-555-0000',
                'is_admin' => true,
            ]
        );

        User::updateOrCreate(
            ['email' => 'superadmin@chauffeurservices.com'],
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@chauffeurservices.com',
                'password' => Hash::make('password123'),
                'phone' => '+1-555-0001',
                'is_admin' => true,
            ]
        );
    }
}

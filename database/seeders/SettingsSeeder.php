<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            [
                'key' => 'site_name',
                'value' => 'Luxury Chauffeur Services',
                'is_file' => false,
            ],
            [
                'key' => 'contact_email',
                'value' => 'info@chauffeurdubai.com',
                'is_file' => false,
            ],
            [
                'key' => 'location',
                'value' => 'Dubai, UAE',
                'is_file' => false,
            ],
            [
                'key' => 'address',
                'value' => 'Business Bay, Dubai, United Arab Emirates',
                'is_file' => false,
            ],
            [
                'key' => 'contact_phone',
                'value' => '+971 52 308 7786',
                'is_file' => false,
            ],
            [
                'key' => 'company_logo',
                'value' => 'uploads/logo.png',
                'is_file' => true,
            ],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}

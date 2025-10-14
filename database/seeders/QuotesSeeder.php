<?php

namespace Database\Seeders;

use App\Models\Quote;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $quotes = [
            [
                'name' => 'John Smith',
                'phone' => '+1-555-0123',
                'email' => 'john.smith@email.com',
                'service_id' => 1, // Airport Transfer Service
                'service_type_id' => 1, // 2-hour service
                'pickup_date' => '2024-12-25',
                'pickup_time' => '14:30:00',
                'pickup_location' => 'Heathrow Airport Terminal 3',
                'drop_off_location' => 'Central London Hotel',
                'total_passengers' => 2,
                'note' => 'Please ensure driver speaks English and vehicle is clean.',
            ],
            [
                'name' => 'Sarah Johnson',
                'phone' => '+1-555-0456',
                'email' => 'sarah.johnson@email.com',
                'service_id' => 2, // City Tour Service
                'service_type_id' => 2, // 4-hour service
                'pickup_date' => '2024-12-26',
                'pickup_time' => '10:00:00',
                'pickup_location' => 'Times Square Hotel',
                'drop_off_location' => 'Central Park',
                'total_passengers' => 4,
                'note' => 'Family with two children, need car seats.',
            ],
            [
                'name' => 'Michael Brown',
                'phone' => '+1-555-0789',
                'email' => 'michael.brown@email.com',
                'service_id' => 3, // Wedding Service
                'service_type_id' => 3, // 8-hour service
                'pickup_date' => '2024-12-31',
                'pickup_time' => '15:00:00',
                'pickup_location' => 'St. Patrick\'s Cathedral',
                'drop_off_location' => 'Grand Ballroom Hotel',
                'total_passengers' => 2,
                'note' => 'Wedding day transportation, please decorate vehicle with white ribbons.',
            ],
        ];

        foreach ($quotes as $quote) {
            Quote::create($quote);
        }
    }
}

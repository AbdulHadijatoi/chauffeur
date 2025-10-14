<?php

namespace Database\Seeders;

use App\Models\Guideline;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuidelinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $guidelines = [
            [
                'type' => 'booking',
                'title' => 'Booking Guidelines',
                'description' => 'Please book your chauffeur service at least 24 hours in advance. Cancellations must be made 4 hours before the scheduled time to avoid charges.',
            ],
            [
                'type' => 'payment',
                'title' => 'Payment Policy',
                'description' => 'We accept all major credit cards, bank transfers, and cash payments. Payment is due upon service completion unless prior arrangements are made.',
            ],
            [
                'type' => 'conduct',
                'title' => 'Passenger Conduct',
                'description' => 'Please treat our chauffeurs with respect. No smoking, eating, or drinking in the vehicle without permission. Maintain appropriate behavior at all times.',
            ],
        ];

        foreach ($guidelines as $guideline) {
            Guideline::create($guideline);
        }
    }
}

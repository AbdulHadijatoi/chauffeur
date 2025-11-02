<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\CityRoute;
use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CityRoutesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Truncate existing city routes
        CityRoute::truncate();
        
        // First, ensure UAE/Dubai country and cities exist
        $uae = Country::firstOrCreate(['name' => 'United Arab Emirates']);
        
        // Define Dubai areas with their coordinates (ordered from small to large)
        $dubaiAreas = [
            ['name' => 'Jumeirah', 'lat' => 25.1954, 'lng' => 55.2292, 'size' => 'small'],
            ['name' => 'Marina', 'lat' => 25.0772, 'lng' => 55.1397, 'size' => 'small'],
            ['name' => 'Downtown Dubai', 'lat' => 25.1972, 'lng' => 55.2794, 'size' => 'small'],
            ['name' => 'Business Bay', 'lat' => 25.1867, 'lng' => 55.2675, 'size' => 'medium'],
            ['name' => 'JLT (Jumeirah Lakes Towers)', 'lat' => 25.0653, 'lng' => 55.1431, 'size' => 'medium'],
            ['name' => 'DIFC (Dubai International Financial Centre)', 'lat' => 25.2178, 'lng' => 55.2769, 'size' => 'medium'],
            ['name' => 'Media City', 'lat' => 25.0794, 'lng' => 55.1394, 'size' => 'medium'],
            ['name' => 'Dubai Mall Area', 'lat' => 25.1979, 'lng' => 55.2788, 'size' => 'medium'],
            ['name' => 'Deira', 'lat' => 25.2694, 'lng' => 55.3086, 'size' => 'large'],
            ['name' => 'Bur Dubai', 'lat' => 25.2639, 'lng' => 55.2964, 'size' => 'large'],
            ['name' => 'Dubai Marina Area', 'lat' => 25.0769, 'lng' => 55.1386, 'size' => 'large'],
            ['name' => 'Jebel Ali', 'lat' => 24.9875, 'lng' => 55.0633, 'size' => 'very large'],
            ['name' => 'Dubai Airport Area', 'lat' => 25.2532, 'lng' => 55.3657, 'size' => 'very large'],
        ];

        // Create or get cities and store their IDs
        $cityMap = [];
        foreach ($dubaiAreas as $area) {
            $city = City::firstOrCreate(
                ['name' => $area['name'], 'country_id' => $uae->id],
                ['latitude' => $area['lat'], 'longitude' => $area['lng']]
            );
            $cityMap[$area['name']] = [
                'id' => $city->id,
                'lat' => $area['lat'],
                'lng' => $area['lng'],
            ];
        }

        // Create routes between all Dubai cities
        $cityNames = array_keys($cityMap);
        
        foreach ($cityNames as $fromCity) {
            foreach ($cityNames as $toCity) {
                if ($fromCity !== $toCity) {
                    $from = $cityMap[$fromCity];
                    $to = $cityMap[$toCity];
                    
                    $distance = $this->calculateDistance($from['lat'], $from['lng'], $to['lat'], $to['lng']);
                    $duration = $this->calculateDuration($distance);
                    
                    // Check if route already exists (avoid duplicates)
                    $existingRoute = CityRoute::where('from_city_id', $from['id'])
                        ->where('to_city_id', $to['id'])
                        ->first();
                    
                    if (!$existingRoute) {
                        CityRoute::create([
                            'from_city_id' => $from['id'],
                            'to_city_id' => $to['id'],
                            'distance' => $distance,
                            'duration' => $duration,
                        ]);
                    }
                }
            }
        }

        $this->command->info('Dubai city routes seeded successfully!');
    }

    /**
     * Calculate distance between two coordinates using Haversine formula
     */
    private function calculateDistance(float $lat1, float $lon1, float $lat2, float $lon2): float
    {
        $earthRadius = 6371; // Earth's radius in kilometers
        
        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);
        
        $a = sin($dLat/2) * sin($dLat/2) +
             cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
             sin($dLon/2) * sin($dLon/2);
        
        $c = 2 * atan2(sqrt($a), sqrt(1-$a));
        
        return round($earthRadius * $c, 2);
    }

    /**
     * Estimate travel time in minutes (considering average speed of 50 km/h in Dubai)
     */
    private function calculateDuration(float $distance): int
    {
        // Base speed: 50 km/h average in Dubai (accounts for traffic)
        $baseSpeed = 50; // km/h
        $minutes = ($distance / $baseSpeed) * 60;
        
        // Add traffic buffer (20% extra time for traffic)
        $minutes = $minutes * 1.2;
        
        // Minimum 15 minutes, round to nearest 5
        return (int) max(15, round($minutes / 5) * 5);
    }
}

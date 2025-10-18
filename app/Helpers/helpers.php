<?php

use App\Models\CityRoute;
use App\Models\ServicesCategory;
use Illuminate\Support\Facades\Cache;
use App\Models\Setting;
use Illuminate\Support\Str;

if (!function_exists('get_setting')) {
    /**
     * Get application setting by key (cached).
     *
     * @param  string|null  $key
     * @param  mixed  $default
     * @return mixed
     */
    function get_setting(?string $key = null, $default = null)
    {
        // Cache all settings for 24 hours
        $settings = Cache::remember('app_settings', now()->addDay(), function () {
            return Setting::pluck('value', 'key', 'is_file', 'image_url')->toArray();
        });

        // Return single setting or all
        if ($key) {
            return $settings[$key] ?? $default;
        }

        return $settings;
    }

}

if(!function_exists('get_city_routes')){
    function get_city_routes(){
        // use cache
        return Cache::remember('city_routes', now()->addDay(), function () {
            $city_routes = CityRoute::with(['fromCity', 'toCity'])->get();
            // map to array with from_city and to_city names
            return $city_routes->map(function($route){
                return [
                    'id' => $route->id,
                    'from_city' => $route->fromCity->name,
                    'to_city' => $route->toCity->name,
                    'duration' => $route->duration,
                    'distance' => $route->distance,
                ];
            });
            
        });
    }
}

if(!function_exists('get_services_categories')){
    function get_services_categories(){
        // use cache
        return Cache::remember('services_categories', now()->addDay(), function () {
            return ServicesCategory::get()->toArray();
        });
    }
}

if (!function_exists('slugify')) {
    /**
     * Convert a string into a URL-friendly slug.
     *
     * @param  string  $string
     * @param  string  $separator
     * @return string
     */
    function slugify(string $string, string $separator = '-'): string
    {
        // Use Laravel's built-in Str::slug helper
        return Str::slug($string, $separator);
    }
}

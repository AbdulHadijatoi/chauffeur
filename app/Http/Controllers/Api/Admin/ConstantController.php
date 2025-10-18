<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use App\Http\Resources\CountryResource;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;

class ConstantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function cities(Request $request)
    {
        cache()->forget('app_cities');
        // Cache all cities for 24 hours
        $cities = Cache::remember('app_cities', now()->addDay(), function () {
            return City::get();
        });

        return CityResource::collection($cities);
    }

    // get countries
    public function countries(Request $request)
    {
        cache()->forget('app_countries');
        // Cache all countries for 24 hours
        $countries = Cache::remember('app_countries', now()->addDay(), function () {
            return \App\Models\Country::get();
        });

        return CountryResource::collection($countries);
    }
}

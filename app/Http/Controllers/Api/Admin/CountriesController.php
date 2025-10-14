<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\CountryResource;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class CountriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Country::with(['cities', 'fromRoutes', 'toRoutes']);

        // Search functionality
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where('name', 'like', "%{$search}%");
        }

        // Pagination
        $perPage = $request->get('per_page', 15);
        $countries = $query->orderBy('name')->paginate($perPage);

        return CountryResource::collection($countries);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:countries,name',
        ]);

        $country = Country::create($request->validated());

        return new CountryResource($country->load(['cities', 'fromRoutes', 'toRoutes']));
    }

    /**
     * Display the specified resource.
     */
    public function show(Country $country)
    {
        return new CountryResource($country->load(['cities', 'fromRoutes', 'toRoutes']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Country $country)
    {
        $request->validate([
            'name' => [
                'sometimes',
                'required',
                'string',
                'max:255',
                Rule::unique('countries', 'name')->ignore($country->id)
            ],
        ]);

        $country->update($request->validated());

        return new CountryResource($country->load(['cities', 'fromRoutes', 'toRoutes']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country)
    {
        // Check if country has cities
        if ($country->cities()->count() > 0) {
            return response()->json([
                'success' => false,
                'message' => 'Cannot delete country with associated cities'
            ], Response::HTTP_CONFLICT);
        }

        $country->delete();

        return response()->json([
            'success' => true,
            'message' => 'Country deleted successfully'
        ]);
    }

    /**
     * Get countries with their cities
     */
    public function withCities()
    {
        $countries = Country::with('cities')->orderBy('name')->get();
        return CountryResource::collection($countries);
    }
}

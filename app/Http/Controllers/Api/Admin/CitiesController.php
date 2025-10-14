<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = City::with(['country', 'fromRoutes', 'toRoutes']);

        // Search functionality
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhereHas('country', function ($countryQuery) use ($search) {
                      $countryQuery->where('name', 'like', "%{$search}%");
                  });
            });
        }

        // Filter by country
        if ($request->has('country_id')) {
            $query->where('country_id', $request->country_id);
        }

        // Pagination
        $perPage = $request->get('per_page', 15);
        $cities = $query->orderBy('name')->paginate($perPage);

        return CityResource::collection($cities);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'country_id' => 'required|exists:countries,id',
        ]);

        $city = City::create($request->validated());

        return new CityResource($city->load(['country', 'fromRoutes', 'toRoutes']));
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
        return new CityResource($city->load(['country', 'fromRoutes', 'toRoutes']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, City $city)
    {
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'country_id' => 'sometimes|required|exists:countries,id',
        ]);

        $city->update($request->validated());

        return new CityResource($city->load(['country', 'fromRoutes', 'toRoutes']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        // Check if city has routes
        if ($city->fromRoutes()->count() > 0 || $city->toRoutes()->count() > 0) {
            return response()->json([
                'success' => false,
                'message' => 'Cannot delete city with associated routes'
            ], Response::HTTP_CONFLICT);
        }

        $city->delete();

        return response()->json([
            'success' => true,
            'message' => 'City deleted successfully'
        ]);
    }

    /**
     * Get cities by country
     */
    public function getByCountry(int $countryId)
    {
        $cities = City::where('country_id', $countryId)
            ->with('country')
            ->orderBy('name')
            ->get();

        return CityResource::collection($cities);
    }

    /**
     * Get all cities for dropdown/select
     */
    public function getAll()
    {
        $cities = City::with('country')->orderBy('name')->get();

        return CityResource::collection($cities);
    }
}

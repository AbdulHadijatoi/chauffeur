<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\CountryRoute;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CountryRoutesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = CountryRoute::with(['fromCountry', 'toCountry']);

        // Search functionality
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->whereHas('fromCountry', function ($countryQuery) use ($search) {
                    $countryQuery->where('name', 'like', "%{$search}%");
                })
                ->orWhereHas('toCountry', function ($countryQuery) use ($search) {
                    $countryQuery->where('name', 'like', "%{$search}%");
                });
            });
        }

        // Filter by from country
        if ($request->has('from_country_id')) {
            $query->where('from_country_id', $request->from_country_id);
        }

        // Filter by to country
        if ($request->has('to_country_id')) {
            $query->where('to_country_id', $request->to_country_id);
        }

        // Filter by duration range
        if ($request->has('min_duration')) {
            $query->where('duration', '>=', $request->min_duration);
        }

        if ($request->has('max_duration')) {
            $query->where('duration', '<=', $request->max_duration);
        }

        // Pagination
        $perPage = $request->get('per_page', 15);
        $routes = $query->orderBy('duration')->paginate($perPage);

        return response()->json([
            'success' => true,
            'data' => $routes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'from_country_id' => 'required|exists:countries,id',
            'to_country_id' => 'required|exists:countries,id|different:from_country_id',
            'duration' => 'required|integer|min:1',
            'distance' => 'required|numeric|min:0.1',
        ]);

        $route = CountryRoute::create($request->validated());

        return response()->json([
            'success' => true,
            'data' => $route->load(['fromCountry', 'toCountry'])
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(CountryRoute $countryRoute)
    {
        return response()->json([
            'success' => true,
            'data' => $countryRoute->load(['fromCountry', 'toCountry'])
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CountryRoute $countryRoute)
    {
        $request->validate([
            'from_country_id' => 'sometimes|required|exists:countries,id',
            'to_country_id' => 'sometimes|required|exists:countries,id|different:from_country_id',
            'duration' => 'sometimes|required|integer|min:1',
            'distance' => 'sometimes|required|numeric|min:0.1',
        ]);

        $countryRoute->update($request->validated());

        return response()->json([
            'success' => true,
            'data' => $countryRoute->load(['fromCountry', 'toCountry'])
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CountryRoute $countryRoute)
    {
        $countryRoute->delete();

        return response()->json([
            'success' => true,
            'message' => 'Country route deleted successfully'
        ]);
    }

    /**
     * Get routes between two countries
     */
    public function getRouteBetween(Request $request)
    {
        $request->validate([
            'from_country_id' => 'required|exists:countries,id',
            'to_country_id' => 'required|exists:countries,id',
        ]);

        $route = CountryRoute::where('from_country_id', $request->from_country_id)
            ->where('to_country_id', $request->to_country_id)
            ->with(['fromCountry', 'toCountry'])
            ->first();

        if (!$route) {
            return response()->json([
                'success' => false,
                'message' => 'Route not found between these countries'
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'success' => true,
            'data' => $route
        ]);
    }
}

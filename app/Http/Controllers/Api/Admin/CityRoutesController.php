<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\CityRoute;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CityRoutesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = CityRoute::with(['fromCity.country', 'toCity.country']);

        // Search functionality
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->whereHas('fromCity', function ($cityQuery) use ($search) {
                    $cityQuery->where('name', 'like', "%{$search}%");
                })
                ->orWhereHas('toCity', function ($cityQuery) use ($search) {
                    $cityQuery->where('name', 'like', "%{$search}%");
                });
            });
        }

        // Filter by from city
        if ($request->has('from_city_id')) {
            $query->where('from_city_id', $request->from_city_id);
        }

        // Filter by to city
        if ($request->has('to_city_id')) {
            $query->where('to_city_id', $request->to_city_id);
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
            'from_city_id' => 'required|exists:cities,id',
            'to_city_id' => 'required|exists:cities,id|different:from_city_id',
            'duration' => 'required|integer|min:1',
            'distance' => 'required|numeric|min:0.1',
        ]);

        $route = CityRoute::create($request->validated());

        return response()->json([
            'success' => true,
            'data' => $route->load(['fromCity.country', 'toCity.country'])
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(CityRoute $cityRoute)
    {
        return response()->json([
            'success' => true,
            'data' => $cityRoute->load(['fromCity.country', 'toCity.country'])
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CityRoute $cityRoute)
    {
        $request->validate([
            'from_city_id' => 'sometimes|required|exists:cities,id',
            'to_city_id' => 'sometimes|required|exists:cities,id|different:from_city_id',
            'duration' => 'sometimes|required|integer|min:1',
            'distance' => 'sometimes|required|numeric|min:0.1',
        ]);

        $cityRoute->update($request->validated());

        return response()->json([
            'success' => true,
            'data' => $cityRoute->load(['fromCity.country', 'toCity.country'])
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CityRoute $cityRoute)
    {
        $cityRoute->delete();

        return response()->json([
            'success' => true,
            'message' => 'City route deleted successfully'
        ]);
    }

    /**
     * Get routes between two cities
     */
    public function getRouteBetween(Request $request)
    {
        $request->validate([
            'from_city_id' => 'required|exists:cities,id',
            'to_city_id' => 'required|exists:cities,id',
        ]);

        $route = CityRoute::where('from_city_id', $request->from_city_id)
            ->where('to_city_id', $request->to_city_id)
            ->with(['fromCity.country', 'toCity.country'])
            ->first();

        if (!$route) {
            return response()->json([
                'success' => false,
                'message' => 'Route not found between these cities'
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'success' => true,
            'data' => $route
        ]);
    }
}

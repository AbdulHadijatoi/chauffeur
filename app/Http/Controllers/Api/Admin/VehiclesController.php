<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;
use App\Http\Resources\VehicleResource;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Vehicle::with(['images', 'specs', 'services']);

        // Search functionality
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where('name', 'like', "%{$search}%");
        }

        // Filter by passengers
        if ($request->has('min_passengers')) {
            $query->where('passengers', '>=', $request->min_passengers);
        }

        if ($request->has('max_passengers')) {
            $query->where('passengers', '<=', $request->max_passengers);
        }

        // Filter by luggage
        if ($request->has('min_luggage')) {
            $query->where('luggage', '>=', $request->min_luggage);
        }

        // Pagination
        $perPage = $request->get('per_page', 15);
        $vehicles = $query->orderBy('name')->paginate($perPage);

        return VehicleResource::collection($vehicles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVehicleRequest $request)
    {
        $vehicle = Vehicle::create($request->validated());

        return new VehicleResource($vehicle->load(['images', 'specs']));
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle)
    {
        return new VehicleResource($vehicle->load(['images', 'specs', 'services']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVehicleRequest $request, Vehicle $vehicle)
    {
        $vehicle->update($request->validated());

        return new VehicleResource($vehicle->load(['images', 'specs']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();

        return response()->json([
            'success' => true,
            'message' => 'Vehicle deleted successfully'
        ]);
    }

    /**
     * Get vehicle with all relationships
     */
    public function showWithRelations(Vehicle $vehicle)
    {
        return new VehicleResource($vehicle->load(['images.file', 'specs', 'services.serviceTypes']));
    }

    /**
     * Bulk delete vehicles
     */
    public function bulkDelete(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'integer|exists:vehicles,id'
        ]);

        Vehicle::whereIn('id', $request->ids)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Vehicles deleted successfully'
        ]);
    }
}

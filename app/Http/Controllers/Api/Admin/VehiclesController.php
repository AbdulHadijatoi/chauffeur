<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;
use App\Http\Resources\VehicleResource;
use App\Models\File;
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
        $query = Vehicle::with(['images']);

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
        
        $vehicles = $query->orderBy('name')->paginate($request->perPage);

        return response()->json([
            'success' => true,
            'data' => [
                'vehicles' => VehicleResource::collection($vehicles),
                'total' => $vehicles->total()
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'passengers' => 'required|integer|min:1',
            'luggage' => 'required|integer|min:0',
            'images' => 'nullable|array'
        ]);

        $vehicle = Vehicle::create([
            'name' => $request->name,
            'description' => $request->description,
            'passengers' => $request->passengers,
            'luggage' => $request->luggage,
        ]);

        if($request->has('images') && is_array($request->images)) {
            foreach ($request->images as $index => $imageId) {

                $file = new File();
                $file->saveFile($imageId, 'vehicle_images');
                $vehicle->images()->create(['file_id' => $file->id, 'is_primary' => $index === 0]);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Vehicle created successfully',
        ], Response::HTTP_CREATED);

        return new VehicleResource($vehicle->load(['images']));
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle)
    {
        return new VehicleResource($vehicle->load(['images']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $vehicle_id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:vehicles,name,' . $vehicle_id,
            'description' => 'nullable|string',
            'passengers' => 'required|integer|min:1',
            'luggage' => 'required|integer|min:0',
            'images' => 'nullable|array',
        ]);

        $vehicle = Vehicle::findOrFail($vehicle_id);
        $vehicle->update([
            'name' => $request->name,
            'description' => $request->description,
            'passengers' => $request->passengers,
            'luggage' => $request->luggage,
        ]);

        if($request->has('images') && is_array($request->images)) {
            // add new images
            foreach ($request->images as $image) {
                $file = new File();
                $file->saveFile($image, 'vehicle_images');
                $vehicle->images()->create(['file_id' => $file->id]);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Vehicle updated successfully'
        ]);
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
        return new VehicleResource($vehicle->load(['images.file']));
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

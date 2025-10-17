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
        $query = Vehicle::with(['images', 'specs']);

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
        
        $vehicles = $query->orderBy('name')->get();

        return VehicleResource::collection($vehicles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            // 'name' => 'required|string|max:255|unique:vehicles,name',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'passengers' => 'required|integer|min:1',
            'luggage' => 'required|integer|min:0',
            'transmission' => 'nullable',
            'mileage' => 'nullable',
            'steering' => 'nullable',
            'fuel_type' => 'nullable',
            'engine' => 'nullable',
            'power' => 'nullable',
            'torque' => 'nullable',
            'acceleration' => 'nullable',
            'top_speed' => 'nullable',
            'fuel_capacity' => 'nullable',
            'weight' => 'nullable',
            'length' => 'nullable',
            'width' => 'nullable',
            'height' => 'nullable',
            'wheelbase' => 'nullable',
            'ground_clearance' => 'nullable',
            'turning_radius' => 'nullable',
            'boot_space' => 'nullable',
            'air_conditioning' => 'nullable',
            'infotainment' => 'nullable',
            'safety_features' => 'nullable',
            'comfort_features' => 'nullable',
            'images' => 'nullable|array'
        ]);

        $vehicle = Vehicle::create([
            'name' => $request->name,
            'description' => $request->description,
            'passengers' => $request->passengers,
            'luggage' => $request->luggage,
        ]);

        $vehicle->specs()->create($request->only([
            'transmission',
            'mileage',
            'steering',
            'fuel_type',
            'engine',
            'power',
            'torque',
            'acceleration',
            'top_speed',
            'fuel_capacity',
            'weight',
            'length',
            'width',
            'height',
            'wheelbase',
            'ground_clearance',
            'turning_radius',
            'boot_space',
            'air_conditioning',
            'infotainment',
            'safety_features',
            'comfort_features',
        ]));

        if($request->has('images') && is_array($request->images)) {
            foreach ($request->images as $index => $imageId) {

                $file = new File();
                $file->saveFile($imageId, 'vehicle_images');
                $vehicle->images()->create(['file_id' => $file->id, 'is_primary' => $index === 0]);
            }
        }

        return new VehicleResource($vehicle->load(['images', 'specs']));
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle)
    {
        return new VehicleResource($vehicle->load(['images', 'specs']));
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
            'transmission' => 'nullable',
            'mileage' => 'nullable',
            'steering' => 'nullable',
            'fuel_type' => 'nullable',
            'engine' => 'nullable',
            'power' => 'nullable',
            'torque' => 'nullable',
            'acceleration' => 'nullable',
            'top_speed' => 'nullable',
            'fuel_capacity' => 'nullable',
            'weight' => 'nullable',
            'length' => 'nullable',
            'width' => 'nullable',
            'height' => 'nullable',
            'wheelbase' => 'nullable',
            'ground_clearance' => 'nullable',
            'turning_radius' => 'nullable',
            'boot_space' => 'nullable',
            'air_conditioning' => 'nullable',
            'infotainment' => 'nullable',
            'safety_features' => 'nullable',
            'comfort_features' => 'nullable',
        ]);

        $vehicle = Vehicle::findOrFail($vehicle_id);
        $vehicle->update([
            'name' => $request->name,
            'description' => $request->description,
            'passengers' => $request->passengers,
            'luggage' => $request->luggage,
        ]);

        $vehicle->specs()->updateOrCreate([], $request->only([
            'transmission',
            'mileage',
            'steering',
            'fuel_type',
            'engine',
            'power',
            'torque',
            'acceleration',
            'top_speed',
            'fuel_capacity',
            'weight',
            'length',
            'width',
            'height',
            'wheelbase',
            'ground_clearance',
            'turning_radius',
            'boot_space',
            'air_conditioning',
            'infotainment',
            'safety_features',
            'comfort_features',
        ]));

        if($request->has('images') && is_array($request->images)) {
            // add new images
            foreach ($request->images as $image) {
                $file = new File();
                $file->saveFile($image, 'vehicle_images');
                $vehicle->images()->create(['file_id' => $file->id]);
            }
        }

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
        return new VehicleResource($vehicle->load(['images.file', 'specs']));
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

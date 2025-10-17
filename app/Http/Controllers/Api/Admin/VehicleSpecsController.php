<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\VehicleSpec;
use Illuminate\Http\Request;

class VehicleSpecsController extends Controller
{
    public function index(Request $request)
    {
        $query = VehicleSpec::with(['vehicle']);

        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->whereHas('vehicle', function ($vehicleQuery) use ($search) {
                $vehicleQuery->where('name', 'like', "%{$search}%");
            });
        }

        if ($request->has('vehicle_id')) {
            $query->where('vehicle_id', $request->vehicle_id);
        }

        // Filter by fuel type
        if ($request->has('fuel_type')) {
            $query->where('fuel_type', $request->fuel_type);
        }

        // Filter by transmission
        if ($request->has('transmission')) {
            $query->where('transmission', $request->transmission);
        }

        
        $specs = $query->orderBy('created_at', 'desc')->get();

        return response()->json(['success' => true, 'data' => $specs]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id|unique:vehicle_specs,vehicle_id',
            'transmission' => 'nullable|string|max:255',
            'mileage' => 'nullable|string|max:255',
            'steering' => 'nullable|string|max:255',
            'fuel_type' => 'nullable|string|max:255',
            'engine' => 'nullable|string|max:255',
            'power' => 'nullable|string|max:255',
            'torque' => 'nullable|string|max:255',
            'acceleration' => 'nullable|string|max:255',
            'top_speed' => 'nullable|string|max:255',
            'fuel_capacity' => 'nullable|string|max:255',
            'weight' => 'nullable|string|max:255',
            'length' => 'nullable|string|max:255',
            'width' => 'nullable|string|max:255',
            'height' => 'nullable|string|max:255',
            'wheelbase' => 'nullable|string|max:255',
            'ground_clearance' => 'nullable|string|max:255',
            'turning_radius' => 'nullable|string|max:255',
            'boot_space' => 'nullable|string|max:255',
            'air_conditioning' => 'nullable|string|max:255',
            'infotainment' => 'nullable|string|max:255',
            'safety_features' => 'nullable|string|max:255',
            'comfort_features' => 'nullable|string|max:255',
        ]);

        $spec = VehicleSpec::create($request->validated());
        return response()->json(['success' => true, 'data' => $spec->load(['vehicle'])]);
    }

    public function show(VehicleSpec $vehicleSpec)
    {
        return response()->json(['success' => true, 'data' => $vehicleSpec->load(['vehicle'])]);
    }

    public function update(Request $request, VehicleSpec $vehicleSpec)
    {
        $request->validate([
            'vehicle_id' => 'sometimes|required|exists:vehicles,id',
            'transmission' => 'nullable|string|max:255',
            'mileage' => 'nullable|string|max:255',
            'steering' => 'nullable|string|max:255',
            'fuel_type' => 'nullable|string|max:255',
            'engine' => 'nullable|string|max:255',
            'power' => 'nullable|string|max:255',
            'torque' => 'nullable|string|max:255',
            'acceleration' => 'nullable|string|max:255',
            'top_speed' => 'nullable|string|max:255',
            'fuel_capacity' => 'nullable|string|max:255',
            'weight' => 'nullable|string|max:255',
            'length' => 'nullable|string|max:255',
            'width' => 'nullable|string|max:255',
            'height' => 'nullable|string|max:255',
            'wheelbase' => 'nullable|string|max:255',
            'ground_clearance' => 'nullable|string|max:255',
            'turning_radius' => 'nullable|string|max:255',
            'boot_space' => 'nullable|string|max:255',
            'air_conditioning' => 'nullable|string|max:255',
            'infotainment' => 'nullable|string|max:255',
            'safety_features' => 'nullable|string|max:255',
            'comfort_features' => 'nullable|string|max:255',
        ]);

        $vehicleSpec->update($request->validated());
        return response()->json(['success' => true, 'data' => $vehicleSpec->load(['vehicle'])]);
    }

    public function destroy(VehicleSpec $vehicleSpec)
    {
        $vehicleSpec->delete();
        return response()->json(['success' => true, 'message' => 'Vehicle specifications deleted successfully']);
    }

    public function getSpecsByVehicle($vehicleId)
    {
        $spec = VehicleSpec::where('vehicle_id', $vehicleId)->with(['vehicle'])->first();

        if (!$spec) {
            return response()->json([
                'success' => false,
                'message' => 'Vehicle specifications not found'
            ], 404);
        }

        return response()->json(['success' => true, 'data' => $spec]);
    }

    public function getAvailableFuelTypes()
    {
        $fuelTypes = VehicleSpec::select('fuel_type')
            ->whereNotNull('fuel_type')
            ->distinct()
            ->orderBy('fuel_type')
            ->pluck('fuel_type');

        return response()->json(['success' => true, 'data' => $fuelTypes]);
    }

    public function getAvailableTransmissions()
    {
        $transmissions = VehicleSpec::select('transmission')
            ->whereNotNull('transmission')
            ->distinct()
            ->orderBy('transmission')
            ->pluck('transmission');

        return response()->json(['success' => true, 'data' => $transmissions]);
    }
}

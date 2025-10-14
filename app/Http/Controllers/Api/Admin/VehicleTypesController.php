<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\VehicleType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class VehicleTypesController extends Controller
{
    public function index(Request $request)
    {
        $query = VehicleType::query();

        if ($request->has('search') && $request->search) {
            $query->where('name', 'like', "%{$request->search}%");
        }

        $perPage = $request->get('per_page', 15);
        $types = $query->orderBy('name')->paginate($perPage);

        return response()->json(['success' => true, 'data' => $types]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:vehicle_types,name',
        ]);

        $type = VehicleType::create($request->validated());
        return response()->json(['success' => true, 'data' => $type]);
    }

    public function show(VehicleType $vehicleType)
    {
        return response()->json(['success' => true, 'data' => $vehicleType]);
    }

    public function update(Request $request, VehicleType $vehicleType)
    {
        $request->validate([
            'name' => ['sometimes', 'required', 'string', 'max:255', Rule::unique('vehicle_types', 'name')->ignore($vehicleType->id)]
        ]);

        $vehicleType->update($request->validated());
        return response()->json(['success' => true, 'data' => $vehicleType]);
    }

    public function destroy(VehicleType $vehicleType)
    {
        $vehicleType->delete();
        return response()->json(['success' => true, 'message' => 'Vehicle type deleted successfully']);
    }
}

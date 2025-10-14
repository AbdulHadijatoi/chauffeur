<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ServicesController extends Controller
{
    public function index(Request $request)
    {
        $query = Service::with(['vehicle', 'serviceTypes']);

        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhereHas('vehicle', function ($vehicleQuery) use ($search) {
                      $vehicleQuery->where('name', 'like', "%{$search}%");
                  });
            });
        }

        if ($request->has('vehicle_id')) {
            $query->where('vehicle_id', $request->vehicle_id);
        }

        $perPage = $request->get('per_page', 15);
        $services = $query->orderBy('name')->paginate($perPage);

        return response()->json(['success' => true, 'data' => $services]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'vehicle_id' => 'required|exists:vehicles,id',
            'description' => 'nullable|string',
        ]);

        $service = Service::create($request->validated());
        return response()->json(['success' => true, 'data' => $service->load(['vehicle', 'serviceTypes'])]);
    }

    public function show(Service $service)
    {
        return response()->json(['success' => true, 'data' => $service->load(['vehicle', 'serviceTypes', 'quotes'])]);
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'vehicle_id' => 'sometimes|required|exists:vehicles,id',
            'description' => 'nullable|string',
        ]);

        $service->update($request->validated());
        return response()->json(['success' => true, 'data' => $service->load(['vehicle', 'serviceTypes'])]);
    }

    public function destroy(Service $service)
    {
        if ($service->quotes()->count() > 0) {
            return response()->json([
                'success' => false,
                'message' => 'Cannot delete service with associated quotes'
            ], 409);
        }

        $service->delete();
        return response()->json(['success' => true, 'message' => 'Service deleted successfully']);
    }
}

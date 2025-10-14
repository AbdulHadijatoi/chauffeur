<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceType;
use Illuminate\Http\Request;

class ServiceTypesController extends Controller
{
    public function index(Request $request)
    {
        $query = ServiceType::with(['service.vehicle']);

        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->whereHas('service', function ($serviceQuery) use ($search) {
                $serviceQuery->where('name', 'like', "%{$search}%");
            });
        }

        if ($request->has('service_id')) {
            $query->where('service_id', $request->service_id);
        }

        if ($request->has('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->has('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        $perPage = $request->get('per_page', 15);
        $serviceTypes = $query->orderBy('hour_duration')->paginate($perPage);

        return response()->json(['success' => true, 'data' => $serviceTypes]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'hour_duration' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0.01',
        ]);

        $serviceType = ServiceType::create($request->validated());
        return response()->json(['success' => true, 'data' => $serviceType->load(['service.vehicle'])]);
    }

    public function show(ServiceType $serviceType)
    {
        return response()->json(['success' => true, 'data' => $serviceType->load(['service.vehicle', 'quotes'])]);
    }

    public function update(Request $request, ServiceType $serviceType)
    {
        $request->validate([
            'service_id' => 'sometimes|required|exists:services,id',
            'hour_duration' => 'sometimes|required|integer|min:1',
            'price' => 'sometimes|required|numeric|min:0.01',
        ]);

        $serviceType->update($request->validated());
        return response()->json(['success' => true, 'data' => $serviceType->load(['service.vehicle'])]);
    }

    public function destroy(ServiceType $serviceType)
    {
        if ($serviceType->quotes()->count() > 0) {
            return response()->json([
                'success' => false,
                'message' => 'Cannot delete service type with associated quotes'
            ], 409);
        }

        $serviceType->delete();
        return response()->json(['success' => true, 'message' => 'Service type deleted successfully']);
    }
}

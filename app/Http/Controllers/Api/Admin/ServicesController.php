<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServicesCategory;
use App\Models\ServiceType;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ServicesController extends Controller
{
    public function index(Request $request)
    {
        $query = Service::with(['vehicle','serviceType', 'servicesCategory']);

         // Search functionality

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

        
        $services = $query->orderBy('id', "DESC")->paginate($request->perPage);
        $total = $services->total();
        $services = $services->map(function ($service) {
            return [
                'id' => $service->id,
                'name' => $service->name,
                'description' => $service->description,
                'vehicle_id' => $service->vehicle ? $service->vehicle->id : null,
                'vehicle_name' => $service->vehicle ? $service->vehicle->name : null,
                'service_type_id' => $service->serviceType ? $service->serviceType->id : null,
                'services_category_id' => $service->services_category_id,
                'services_category_name' => $service->servicesCategory ? $service->servicesCategory->name : null,
                'hour_duration' => $service->serviceType ? $service->serviceType->hour_duration : null,
                'price' => $service->serviceType ? $service->serviceType->price : null,
                'additional_price' => $service->serviceType ? $service->serviceType->additional_price : null,
            ];
        });

        return response()->json([
            'success' => true,
            'data' => [
                'services' => $services,
                'total' => $total
            ]
        ]);
    }

    public function constants(){
        $vehicles = Vehicle::get(['id','name']);
        $services_categories = ServicesCategory::get(['id','name']);
        return response()->json(['success' => true, 'data' => ['vehicles'=>$vehicles, 'services_categories'=>$services_categories]]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'vehicle_id' => 'required|exists:vehicles,id',
            'services_category_id' => 'required|exists:services_categories,id',
            'description' => 'nullable|string',
            'hour_duration' => 'required|numeric|min:1',
            'price' => 'required|numeric|min:1',
            'additional_price' => 'required|numeric|min:1',
        ]);

        $service = Service::create([
            'name' => $request->name,
            'vehicle_id' => $request->vehicle_id,
            'description' => $request->description,
            'services_category_id' => $request->services_category_id,
        ]);

        $serviceType = ServiceType::create([
            'service_id' => $service->id,
            'hour_duration' => $request->hour_duration,
            'price' => $request->price,
            'additional_price' => $request->additional_price,
        ]);
        
        return response()->json([
            'success' => true,
            'message' => 'Service created successfully',
            'data' => $service->load(['vehicle', 'serviceType'])
        ]);
    }

    public function show(Service $service)
    {
        return response()->json(['success' => true, 'data' => $service->load(['vehicle', 'serviceType', 'quotes'])]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'vehicle_id' => 'sometimes|required|exists:vehicles,id',
            'services_category_id' => 'required|exists:services_categories,id',
            'description' => 'nullable|string',
            'hour_duration' => 'required|numeric|min:1',
            'price' => 'required|numeric|min:1',
            'additional_price' => 'required|numeric|min:1',
        ]);

        $service = Service::find($id);

        $service->update([
            'name' => $request->name ?? $service->name,
            'vehicle_id' => $request->vehicle_id ?? $service->vehicle_id,
            'services_category_id' => $request->services_category_id ?? $service->services_category_id,
            'description' => $request->description ?? $service->description,
        ]);

        if ($request->has('hour_duration') || $request->has('price') || $request->has('additional_price')) {
            $serviceType = $service->serviceType()->first();
            if ($serviceType) {
                $serviceType->update([
                    'hour_duration' => $request->hour_duration ?? $serviceType->hour_duration,
                    'price' => $request->price ?? $serviceType->price,
                    'additional_price' => $request->additional_price ?? $serviceType->additional_price,
                ]);
            } else {
                ServiceType::create([
                    'service_id' => $service->id,
                    'hour_duration' => $request->hour_duration,
                    'price' => $request->price,
                    'additional_price' => $request->additional_price,
                ]);
            }
        }
        
        return response()->json([
            'success' => true,
            'message' => 'Service updated successfully',
        ]);
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        // if ($service->quotes()->count() > 0) {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Cannot delete service with associated quotes'
        //     ], 409);
        // }

        $service->serviceType()->delete();

        $service->delete();
        return response()->json(['success' => true, 'message' => 'Service deleted successfully']);
    }
}

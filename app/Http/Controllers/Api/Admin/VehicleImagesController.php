<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\VehicleImage;
use App\Models\Vehicle;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VehicleImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = VehicleImage::with(['vehicle', 'file']);

        // Filter by vehicle
        if ($request->has('vehicle_id')) {
            $query->where('vehicle_id', $request->vehicle_id);
        }

        // Search functionality
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->whereHas('vehicle', function ($vehicleQuery) use ($search) {
                $vehicleQuery->where('name', 'like', "%{$search}%");
            });
        }

        
        $images = $query->orderBy('created_at', 'desc')->get();

        return response()->json([
            'success' => true,
            'data' => $images
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'file_id' => 'required|exists:files,path',
        ]);

        $vehicleImage = VehicleImage::create($request->validated());

        return response()->json([
            'success' => true,
            'data' => $vehicleImage->load(['vehicle', 'file'])
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(VehicleImage $vehicleImage)
    {
        return response()->json([
            'success' => true,
            'data' => $vehicleImage->load(['vehicle', 'file'])
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VehicleImage $vehicleImage)
    {
        $request->validate([
            'vehicle_id' => 'sometimes|required|exists:vehicles,id',
            'file_id' => 'sometimes|required|exists:files,path',
        ]);

        $vehicleImage->update($request->validated());

        return response()->json([
            'success' => true,
            'data' => $vehicleImage->load(['vehicle', 'file'])
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VehicleImage $vehicleImage)
    {
        $vehicleImage->delete();

        return response()->json([
            'success' => true,
            'message' => 'Vehicle image deleted successfully'
        ]);
    }

    /**
     * Delete vehicle image by ID
     */
    public function deleteById($id)
    {
        $vehicleImage = VehicleImage::find($id);

        if (!$vehicleImage) {
            return response()->json([
                'success' => false,
                'message' => 'Vehicle image not found'
            ], 404);
        }

        $vehicleImage->delete();

        return response()->json([
            'success' => true,
            'message' => 'Vehicle image deleted successfully'
        ]);
    }

    /**
     * Upload image for vehicle
     */
    public function uploadImage(Request $request)
    {
        $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'image' => 'required|image|max:10240', // 10MB max
        ]);

        $vehicle = Vehicle::findOrFail($request->vehicle_id);
        $file = $request->file('image');

        // Save the file using File model
        $savedFile = File::saveFile($file, 'vehicle-images');

        // Create vehicle image record
        $vehicleImage = VehicleImage::create([
            'vehicle_id' => $vehicle->id,
            'file_id' => $savedFile->path,
        ]);

        return response()->json([
            'success' => true,
            'data' => $vehicleImage->load(['vehicle', 'file'])
        ]);
    }

    /**
     * Get images for a specific vehicle
     */
    public function getVehicleImages(Vehicle $vehicle)
    {
        $images = $vehicle->images()->with('file')->orderBy('created_at', 'desc')->get();

        return response()->json([
            'success' => true,
            'data' => $images
        ]);
    }

    /**
     * Set primary image for vehicle
     */
    public function setPrimary(Request $request, $vehicle_id)
    {
        $request->validate([
            'vehicle_image_id' => 'required|exists:vehicle_images,id',
        ]);

        $vehicleImage = VehicleImage::where('vehicle_id', $vehicle_id)
            ->where('id', $request->vehicle_image_id)
            ->firstOrFail();

        if ($vehicleImage->is_primary) {
            return response()->json([
                'success' => true,
                'message' => 'This image is already the primary image'
            ]);
        }

        // Set this image as primary
        $vehicleImage->update(['is_primary' => 1]);

        return response()->json([
            'success' => true,
            'message' => 'Primary image updated successfully'
        ]);
    }
}

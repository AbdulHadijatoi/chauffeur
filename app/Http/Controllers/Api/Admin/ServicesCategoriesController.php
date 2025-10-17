<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServicesCategoryResource;
use App\Models\File;
use App\Models\ServicesCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class ServicesCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = ServicesCategory::query();

        // Search functionality
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where('name', 'like', "%{$search}%");
        }

        // Pagination
        
        $categories = $query->orderBy('name')->get();

        return ServicesCategoryResource::collection($categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:services_categories,name',
            'description' => 'nullable',
            'image' => 'nullable',
        ]);

        $category = ServicesCategory::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        // Handle image upload if exists
        if ($request->hasFile('image')) {
            $file = new File();
            $file->saveFile($request->file('image'), 'services_category_images');
            $category->file_id = $file->id;
            $category->save();
        }

        cache()->forget('services_categories');

        return new ServicesCategoryResource($category);
    }

    /**
     * Display the specified resource.
     */
    public function show(ServicesCategory $servicesCategory)
    {
        return new ServicesCategoryResource($servicesCategory);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $services_category_id)
    {
        $request->validate([
            'name' => 'nullable',
            'description' => 'nullable',
            'image' => 'nullable',
        ]);
        
        $servicesCategory = ServicesCategory::findOrFail($services_category_id);

        $servicesCategory->update([
            'name' => $request->name ?? $servicesCategory->name,
            'description' => $request->description ?? $servicesCategory->description,
            'image' => $request->image ?? $servicesCategory->image,
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            $oldImage = $servicesCategory->file;
            if ($oldImage) {
                $oldImage->delete();
            }

            // Save new image
            $file = new File();
            $file->saveFile($request->file('image'), 'services_category_images');
            $servicesCategory->file_id = $file->id;
            $servicesCategory->save();
        }

        cache()->forget('services_categories');

        return new ServicesCategoryResource($servicesCategory);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServicesCategory $servicesCategory)
    {
        $servicesCategory->delete();

        cache()->forget('services_categories');

        return response()->json([
            'success' => true,
            'message' => 'Service category deleted successfully'
        ]);
    }

    /**
     * Get all categories for dropdown/select
     */
    public function getAll()
    {
        $categories = ServicesCategory::orderBy('name')->get();

        return ServicesCategoryResource::collection($categories);
    }
}

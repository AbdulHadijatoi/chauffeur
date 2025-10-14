<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServicesCategoryResource;
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
        $perPage = $request->get('per_page', 15);
        $categories = $query->orderBy('name')->paginate($perPage);

        return ServicesCategoryResource::collection($categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:services_categories,name',
        ]);

        $category = ServicesCategory::create($request->validated());

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
    public function update(Request $request, ServicesCategory $servicesCategory)
    {
        $request->validate([
            'name' => [
                'sometimes',
                'required',
                'string',
                'max:255',
                Rule::unique('services_categories', 'name')->ignore($servicesCategory->id)
            ],
        ]);

        $servicesCategory->update($request->validated());

        return new ServicesCategoryResource($servicesCategory);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServicesCategory $servicesCategory)
    {
        $servicesCategory->delete();

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

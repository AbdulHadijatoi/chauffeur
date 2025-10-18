<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\GuidelineResource;
use App\Models\Guideline;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GuidelinesController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // use cache in this to improve performance
    public function index(Request $request)
    {
        $query = Guideline::query();

        // Search functionality
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('type', 'like', "%{$search}%")
                  ->orWhere('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Filter by type
        if ($request->has('type') && $request->type) {
            $query->where('type', $request->type);
        }

        $guidelines = $query->orderBy('id','DESC')->get();

        return GuidelineResource::collection($guidelines);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $guideline = Guideline::create([
            'type' => $request->type,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return new GuidelineResource($guideline);
    }

    /**
     * Display the specified resource.
     */
    public function show(Guideline $guideline)
    {
        return new GuidelineResource($guideline);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'sometimes|required|string|max:255',
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $guideline = Guideline::find($id);
        $guideline->update([
            'type' => $request->type ?? $guideline->type,
            'title' => $request->title ?? $guideline->title,
            'description' => $request->description ?? $guideline->description,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Guideline updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guideline $guideline)
    {
        $guideline->delete();

        return response()->json([
            'success' => true,
            'message' => 'Guideline deleted successfully'
        ]);
    }

    /**
     * Get guidelines by type
     */
    public function getByType(string $type)
    {
        $guidelines = Guideline::where('type', $type)->orderBy('title')->get();

        return GuidelineResource::collection($guidelines);
    }

    /**
     * Get all guideline types
     */
    public function getTypes()
    {
        $types = Guideline::select('type')
            ->distinct()
            ->orderBy('type')
            ->pluck('type');

        return response()->json([
            'success' => true,
            'data' => $types
        ]);
    }
}

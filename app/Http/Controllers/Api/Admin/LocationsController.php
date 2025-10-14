<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LocationsController extends Controller
{
    public function index(Request $request)
    {
        $query = Location::query();

        if ($request->has('search') && $request->search) {
            $query->where('name', 'like', "%{$request->search}%");
        }

        $perPage = $request->get('per_page', 15);
        $locations = $query->orderBy('name')->paginate($perPage);

        return response()->json(['success' => true, 'data' => $locations]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:locations,name',
        ]);

        $location = Location::create($request->validated());
        return response()->json(['success' => true, 'data' => $location]);
    }

    public function show(Location $location)
    {
        return response()->json(['success' => true, 'data' => $location]);
    }

    public function update(Request $request, Location $location)
    {
        $request->validate([
            'name' => ['sometimes', 'required', 'string', 'max:255', Rule::unique('locations', 'name')->ignore($location->id)]
        ]);

        $location->update($request->validated());
        return response()->json(['success' => true, 'data' => $location]);
    }

    public function destroy(Location $location)
    {
        $location->delete();
        return response()->json(['success' => true, 'message' => 'Location deleted successfully']);
    }
}

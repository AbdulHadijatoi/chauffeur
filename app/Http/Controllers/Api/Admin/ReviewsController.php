<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReviewResource;
use App\Models\Review;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Review::with(['service', 'user']);

        // Search functionality
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('user_name', 'like', "%{$search}%")
                  ->orWhere('comment', 'like', "%{$search}%")
                  ->orWhereHas('service', function ($serviceQuery) use ($search) {
                      $serviceQuery->where('name', 'like', "%{$search}%");
                  });
            });
        }

        // Filter by service_id
        if ($request->has('service_id') && $request->service_id) {
            $query->where('service_id', $request->service_id);
        }

        // Filter by rating
        if ($request->has('rating') && $request->rating) {
            $query->where('rating', $request->rating);
        }

        // Filter by user_id
        if ($request->has('user_id') && $request->user_id) {
            $query->where('user_id', $request->user_id);
        }

        $reviews = $query->orderBy('id', 'DESC')->paginate($request->per_page ?? 15);

        return response()->json([
            'success' => true,
            'data' => ReviewResource::collection($reviews),
            'meta' => [
                'current_page' => $reviews->currentPage(),
                'last_page' => $reviews->lastPage(),
                'per_page' => $reviews->perPage(),
                'total' => $reviews->total(),
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'user_id' => 'nullable|exists:users,id',
            'user_name' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
            'file_id' => 'nullable|exists:files,id',
        ]);

        $review = Review::create([
            'service_id' => $request->service_id,
            'user_id' => $request->user_id,
            'user_name' => $request->user_name,
            'rating' => $request->rating,
            'comment' => $request->comment,
            'file_id' => $request->file_id,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Review created successfully',
            'data' => new ReviewResource($review->load(['service', 'user']))
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $review = Review::with(['service', 'user'])->find($id);

        if (!$review) {
            return response()->json([
                'success' => false,
                'message' => 'Review not found'
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'success' => true,
            'data' => new ReviewResource($review)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $review = Review::find($id);

        if (!$review) {
            return response()->json([
                'success' => false,
                'message' => 'Review not found'
            ], Response::HTTP_NOT_FOUND);
        }

        $request->validate([
            'service_id' => 'sometimes|required|exists:services,id',
            'user_id' => 'nullable|exists:users,id',
            'user_name' => 'sometimes|required|string|max:255',
            'rating' => 'sometimes|required|integer|min:1|max:5',
            'comment' => 'sometimes|required|string',
            'file_id' => 'nullable|exists:files,id',
        ]);

        $review->update([
            'service_id' => $request->service_id ?? $review->service_id,
            'user_id' => $request->user_id ?? $review->user_id,
            'user_name' => $request->user_name ?? $review->user_name,
            'rating' => $request->rating ?? $review->rating,
            'comment' => $request->comment ?? $review->comment,
            'file_id' => $request->file_id ?? $review->file_id,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Review updated successfully',
            'data' => new ReviewResource($review->load(['service', 'user']))
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $review = Review::find($id);

        if (!$review) {
            return response()->json([
                'success' => false,
                'message' => 'Review not found'
            ], Response::HTTP_NOT_FOUND);
        }

        $review->delete();

        return response()->json([
            'success' => true,
            'message' => 'Review deleted successfully'
        ]);
    }

    /**
     * Get reviews by service
     */
    public function getByService($serviceId)
    {
        $service = Service::find($serviceId);

        if (!$service) {
            return response()->json([
                'success' => false,
                'message' => 'Service not found'
            ], Response::HTTP_NOT_FOUND);
        }

        $reviews = Review::where('service_id', $serviceId)
            ->with(['service', 'user'])
            ->orderBy('id', 'DESC')
            ->get();

        return response()->json([
            'success' => true,
            'data' => ReviewResource::collection($reviews)
        ]);
    }
}


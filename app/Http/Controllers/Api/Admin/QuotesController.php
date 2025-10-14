<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuoteResource;
use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class QuotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Quote::with(['service', 'serviceType']);

        // Search functionality
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        // Filter by service
        if ($request->has('service_id')) {
            $query->where('service_id', $request->service_id);
        }

        // Filter by date range
        if ($request->has('date_from')) {
            $query->where('pickup_date', '>=', $request->date_from);
        }

        if ($request->has('date_to')) {
            $query->where('pickup_date', '<=', $request->date_to);
        }

        // Filter by status (you can add a status field later)
        if ($request->has('status')) {
            // Add status filtering logic here when status field is added
        }

        // Pagination
        $perPage = $request->get('per_page', 15);
        $quotes = $query->orderBy('created_at', 'desc')->paginate($perPage);

        return QuoteResource::collection($quotes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'service_id' => 'required|exists:services,id',
            'service_type_id' => 'required|exists:service_types,id',
            'pickup_date' => 'required|date|after_or_equal:today',
            'pickup_time' => 'required|date_format:H:i',
            'pickup_location' => 'required|string|max:255',
            'drop_off_location' => 'required|string|max:255',
            'total_passengers' => 'required|integer|min:1|max:20',
            'note' => 'nullable|string',
        ]);

        $quote = Quote::create($request->validated());

        return new QuoteResource($quote->load(['service', 'serviceType']));
    }

    /**
     * Display the specified resource.
     */
    public function show(Quote $quote)
    {
        return new QuoteResource($quote->load(['service.vehicle', 'serviceType']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quote $quote)
    {
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'phone' => 'sometimes|required|string|max:20',
            'email' => 'sometimes|required|email|max:255',
            'service_id' => 'sometimes|required|exists:services,id',
            'service_type_id' => 'sometimes|required|exists:service_types,id',
            'pickup_date' => 'sometimes|required|date|after_or_equal:today',
            'pickup_time' => 'sometimes|required|date_format:H:i',
            'pickup_location' => 'sometimes|required|string|max:255',
            'drop_off_location' => 'sometimes|required|string|max:255',
            'total_passengers' => 'sometimes|required|integer|min:1|max:20',
            'note' => 'nullable|string',
        ]);

        $quote->update($request->validated());

        return new QuoteResource($quote->load(['service', 'serviceType']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quote $quote)
    {
        $quote->delete();

        return response()->json([
            'success' => true,
            'message' => 'Quote deleted successfully'
        ]);
    }

    /**
     * Get quotes statistics
     */
    public function statistics()
    {
        $stats = [
            'total_quotes' => Quote::count(),
            'quotes_today' => Quote::whereDate('created_at', today())->count(),
            'quotes_this_month' => Quote::whereMonth('created_at', now()->month)->count(),
            'quotes_by_service' => Quote::with('service')
                ->selectRaw('service_id, COUNT(*) as count')
                ->groupBy('service_id')
                ->get()
                ->map(function ($item) {
                    return [
                        'service_name' => $item->service->name,
                        'count' => $item->count
                    ];
                })
        ];

        return response()->json([
            'success' => true,
            'data' => $stats
        ]);
    }

    /**
     * Export quotes to CSV
     */
    public function export(Request $request)
    {
        $quotes = Quote::with(['service', 'serviceType'])
            ->orderBy('created_at', 'desc')
            ->get();

        $csvData = [];
        $csvData[] = [
            'ID', 'Name', 'Email', 'Phone', 'Service', 'Service Type',
            'Pickup Date', 'Pickup Time', 'Pickup Location', 'Drop Off Location',
            'Total Passengers', 'Note', 'Created At'
        ];

        foreach ($quotes as $quote) {
            $csvData[] = [
                $quote->id,
                $quote->name,
                $quote->email,
                $quote->phone,
                $quote->service->name,
                $quote->serviceType->hour_duration . ' hours - $' . $quote->serviceType->price,
                $quote->pickup_date,
                $quote->pickup_time,
                $quote->pickup_location,
                $quote->drop_off_location,
                $quote->total_passengers,
                $quote->note,
                $quote->created_at
            ];
        }

        return response()->json([
            'success' => true,
            'data' => $csvData
        ]);
    }
}

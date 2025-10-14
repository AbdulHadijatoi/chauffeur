<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuoteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'service' => $this->whenLoaded('service', function () {
                return [
                    'id' => $this->service->id,
                    'name' => $this->service->name,
                    'description' => $this->service->description,
                    'vehicle' => $this->whenLoaded('service.vehicle', function () {
                        return [
                            'id' => $this->service->vehicle->id,
                            'name' => $this->service->vehicle->name,
                            'passengers' => $this->service->vehicle->passengers,
                            'luggage' => $this->service->vehicle->luggage,
                        ];
                    })
                ];
            }),
            'service_type' => $this->whenLoaded('serviceType', function () {
                return [
                    'id' => $this->serviceType->id,
                    'hour_duration' => $this->serviceType->hour_duration,
                    'price' => $this->serviceType->price,
                ];
            }),
            'pickup_date' => $this->pickup_date,
            'pickup_time' => $this->pickup_time,
            'pickup_location' => $this->pickup_location,
            'drop_off_location' => $this->drop_off_location,
            'total_passengers' => $this->total_passengers,
            'note' => $this->note,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

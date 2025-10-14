<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CountryResource extends JsonResource
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
            'cities' => $this->whenLoaded('cities', function () {
                return $this->cities->map(function ($city) {
                    return [
                        'id' => $city->id,
                        'name' => $city->name,
                        'country_id' => $city->country_id,
                    ];
                });
            }),
            'from_routes' => $this->whenLoaded('fromRoutes'),
            'to_routes' => $this->whenLoaded('toRoutes'),
            'cities_count' => $this->when(isset($this->cities_count), $this->cities_count),
        ];
    }
}

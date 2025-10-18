<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VehicleResource extends JsonResource
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
            'description' => $this->description,
            'passengers' => $this->passengers,
            'luggage' => $this->luggage,
            'image_url' => $this->whenLoaded('images', function () {
                $firstImage = $this->images->first();
                return $firstImage ? $firstImage->image_url : null;
            }),
            'images' => $this->whenLoaded('images', function () {
                return $this->images->map(function ($image) {
                    return [
                        'id' => $image->id,
                        'image_url' => $image->image_url,
                    ];
                });
            }),
            'transmission' => $this->whenLoaded('specs', fn() => $this->specs->transmission),
            'mileage' => $this->whenLoaded('specs', fn() => $this->specs->mileage),
            'steering' => $this->whenLoaded('specs', fn() => $this->specs->steering),
            'fuel_type' => $this->whenLoaded('specs', fn() => $this->specs->fuel_type),
            'engine' => $this->whenLoaded('specs', fn() => $this->specs->engine),
            'power' => $this->whenLoaded('specs', fn() => $this->specs->power),
            'torque' => $this->whenLoaded('specs', fn() => $this->specs->torque),
            'acceleration' => $this->whenLoaded('specs', fn() => $this->specs->acceleration),
            'top_speed' => $this->whenLoaded('specs', fn() => $this->specs->top_speed),
            'fuel_capacity' => $this->whenLoaded('specs', fn() => $this->specs->fuel_capacity),
            'weight' => $this->whenLoaded('specs', fn() => $this->specs->weight),
            'length' => $this->whenLoaded('specs', fn() => $this->specs->length),
            'width' => $this->whenLoaded('specs', fn() => $this->specs->width),
            'height' => $this->whenLoaded('specs', fn() => $this->specs->height),
            'wheelbase' => $this->whenLoaded('specs', fn() => $this->specs->wheelbase),
            'ground_clearance' => $this->whenLoaded('specs', fn() => $this->specs->ground_clearance),
            'turning_radius' => $this->whenLoaded('specs', fn() => $this->specs->turning_radius),
            'boot_space' => $this->whenLoaded('specs', fn() => $this->specs->boot_space),
            'air_conditioning' => $this->whenLoaded('specs', fn() => $this->specs->air_conditioning),
            'infotainment' => $this->whenLoaded('specs', fn() => $this->specs->infotainment),
            'safety_features' => $this->whenLoaded('specs', fn() => $this->specs->safety_features),
            'comfort_features' => $this->whenLoaded('specs', fn() => $this->specs->comfort_features),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

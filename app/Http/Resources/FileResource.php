<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'path' => $this->path,
            'type' => $this->type,
            'full_path' => $this->full_path,
            'filename' => basename($this->path),
            'extension' => pathinfo($this->path, PATHINFO_EXTENSION),
            'size' => $this->when($request->routeIs('*.info'), function () {
                return \Storage::disk('public')->size($this->path);
            }),
        ];
    }
}

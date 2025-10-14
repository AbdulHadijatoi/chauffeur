<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleImage extends Model
{
    protected $fillable = [
        'vehicle_id',
        'file_id',
    ];

    protected $appends = [
        'image_url',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function file()
    {
        return $this->belongsTo(File::class, 'file_id', 'path');
    }

    public function getImageUrlAttribute()
    {
        return $this->file ? $this->file->full_path : null;
    }
}

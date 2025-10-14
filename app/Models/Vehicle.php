<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'passengers',
        'luggage',
    ];

    public function images()
    {
        return $this->hasMany(VehicleImage::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function specs()
    {
        return $this->hasOne(VehicleSpec::class);
    }
}

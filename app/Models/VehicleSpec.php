<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleSpec extends Model
{
    protected $fillable = [
        'vehicle_id',
        'transmission',
        'mileage',
        'steering',
        'fuel_type',
        'engine',
        'power',
        'torque',
        'acceleration',
        'top_speed',
        'fuel_capacity',
        'weight',
        'length',
        'width',
        'height',
        'wheelbase',
        'ground_clearance',
        'turning_radius',
        'boot_space',
        'air_conditioning',
        'infotainment',
        'safety_features',
        'comfort_features',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}

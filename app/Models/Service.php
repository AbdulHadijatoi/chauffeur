<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name',
        'vehicle_id',
        'description',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function quotes()
    {
        return $this->hasMany(Quote::class);
    }

    public function serviceTypes()
    {
        return $this->hasMany(ServiceType::class, 'service_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name',
        'service_category_id',
        'vehicle_id',
        'description',
    ];

    public function serviceCategory()
    {
        return $this->belongsTo(ServicesCategory::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function quotes()
    {
        return $this->hasMany(Quote::class);
    }

    public function serviceType()
    {
        return $this->hasOne(ServiceType::class, 'service_id');
    }
}

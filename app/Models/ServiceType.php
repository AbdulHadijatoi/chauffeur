<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'service_id',
        'hour_duration',
        'price',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function quotes()
    {
        return $this->hasMany(Quote::class);
    }
}

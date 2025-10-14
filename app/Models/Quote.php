<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'service_id',
        'service_type_id',
        'pickup_date',
        'pickup_time',
        'pickup_location',
        'drop_off_location',
        'total_passengers',
        'note',
    ];

    protected $casts = [
        'pickup_date' => 'date',
        'pickup_time' => 'datetime:H:i',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function serviceType()
    {
        return $this->belongsTo(ServiceType::class);
    }
}

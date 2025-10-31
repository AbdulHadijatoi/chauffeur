<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'country_id',
        'latitude',
        'longitude',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function fromRoutes()
    {
        return $this->hasMany(CityRoute::class, 'from_city_id');
    }

    public function toRoutes()
    {
        return $this->hasMany(CityRoute::class, 'to_city_id');
    }
}

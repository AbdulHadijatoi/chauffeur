<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function fromRoutes()
    {
        return $this->hasMany(CountryRoute::class, 'from_country_id');
    }

    public function toRoutes()
    {
        return $this->hasMany(CountryRoute::class, 'to_country_id');
    }
}

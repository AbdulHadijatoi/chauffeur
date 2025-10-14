<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountryRoute extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'from_country_id',
        'to_country_id',
        'duration',
        'distance',
    ];

    public function fromCountry()
    {
        return $this->belongsTo(Country::class, 'from_country_id');
    }

    public function toCountry()
    {
        return $this->belongsTo(Country::class, 'to_country_id');
    }
}

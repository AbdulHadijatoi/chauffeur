<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'key',
        'value',
        'is_file',
    ];

    protected $casts = [
        'is_file' => 'boolean',
    ];
}

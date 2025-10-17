<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicesCategory extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'file_id',
    ];

    protected $appends = [
        'image_url',
    ];

    public function getImageUrlAttribute()
    {
        return $this->file ? $this->file->full_path : null;
    }

    public function file()
    {
        return $this->belongsTo(File::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}

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

    protected $appends = [
        'image_url',
    ];
    
    protected $casts = [
        'is_file' => 'boolean',
    ];

    public function file()
    {
        return $this->belongsTo(File::class, 'file_id', 'id');
    }

    public function getImageUrlAttribute()
    {
        return $this->file ? $this->file->full_path : null;
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'user_id',
        'user_name',
        'file_id',
        'rating',
        'comment',
    ];

    protected $appends = [
        'image_url',
    ];

    public function getImageUrlAttribute()
    {
        return $this->file ? $this->file->full_path : null;
    }

    // Relationships
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function file()
    {
        return $this->belongsTo(File::class);
    }
}

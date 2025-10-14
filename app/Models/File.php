<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class File extends Model
{
    protected $primaryKey = 'path';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'path',
        'type',
    ];

    protected $appends = [
        'full_path',
    ];

    public function getFullPathAttribute()
    {
        return Storage::url($this->path);
    }

    public static function saveFile(UploadedFile $file, string $directory = 'uploads'): self
    {
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs($directory, $filename, 'public');
        
        return self::create([
            'path' => $path,
            'type' => $file->getMimeType(),
        ]);
    }
}

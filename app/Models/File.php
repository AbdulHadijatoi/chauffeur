<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class File extends Model
{
    public $timestamps = false;

    protected $guarded = [
        // 'path', 'type'
    ];
    
    // append full path to the model
    protected $appends = ['full_path'];
    
    public function getFullPathAttribute()
    {
        return url(Storage::url($this->path));
    }

    public function saveFile($file, $directory = 'files')
    {
        $path = $file->store($directory,'public');
        $this->path = $path;
        $this->type = $file->getClientMimeType();
        $this->save();

        // return the file path
        return $this->path;
    }
}

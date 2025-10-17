<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\FileResource;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = File::query();

        // Search functionality
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('path', 'like', "%{$search}%")
                  ->orWhere('type', 'like', "%{$search}%");
            });
        }

        // Filter by type
        if ($request->has('type') && $request->type) {
            $query->where('type', $request->type);
        }

        // Filter by file extension
        if ($request->has('extension') && $request->extension) {
            $extension = $request->extension;
            $query->where('path', 'like', "%.{$extension}");
        }

        // Pagination
        
        $files = $query->orderBy('path')->get();

        return FileResource::collection($files);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:10240', // 10MB max
            'directory' => 'nullable|string|max:255',
        ]);

        $directory = $request->get('directory', 'uploads');
        $file = $request->file('file');

        // Use the File model's saveFile method
        $savedFile = File::saveFile($file, $directory);

        return new FileResource($savedFile);
    }

    /**
     * Display the specified resource.
     */
    public function show(File $file)
    {
        return new FileResource($file);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, File $file)
    {
        $request->validate([
            'path' => 'sometimes|required|string|max:255',
            'type' => 'sometimes|required|string|max:255',
        ]);

        // If path is being updated, check if new path already exists
        if ($request->has('path') && $request->path !== $file->path) {
            $request->validate([
                'path' => ['required', 'string', 'max:255', Rule::unique('files', 'path')->ignore($file->path, 'path')]
            ]);
        }

        $file->update($request->validated());

        return new FileResource($file);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(File $file)
    {
        // Delete the physical file from storage
        if (Storage::disk('public')->exists($file->path)) {
            Storage::disk('public')->delete($file->path);
        }

        // Delete the database record
        $file->delete();

        return response()->json([
            'success' => true,
            'message' => 'File deleted successfully'
        ]);
    }

    /**
     * Upload multiple files
     */
    public function uploadMultiple(Request $request)
    {
        $request->validate([
            'files' => 'required|array|max:10',
            'files.*' => 'file|max:10240',
            'directory' => 'nullable|string|max:255',
        ]);

        $directory = $request->get('directory', 'uploads');
        $uploadedFiles = [];

        foreach ($request->file('files') as $file) {
            $savedFile = File::saveFile($file, $directory);
            $uploadedFiles[] = $savedFile;
        }

        return FileResource::collection($uploadedFiles);
    }

    /**
     * Get file types
     */
    public function getTypes()
    {
        $types = File::select('type')
            ->distinct()
            ->orderBy('type')
            ->pluck('type');

        return response()->json([
            'success' => true,
            'data' => $types
        ]);
    }

    /**
     * Download file
     */
    public function download(File $file)
    {
        if (!Storage::disk('public')->exists($file->path)) {
            return response()->json([
                'success' => false,
                'message' => 'File not found'
            ], Response::HTTP_NOT_FOUND);
        }

        return Storage::disk('public')->download($file->path);
    }

    /**
     * Get file info
     */
    public function info(File $file)
    {
        $fileInfo = [
            'path' => $file->path,
            'type' => $file->type,
            'full_path' => $file->full_path,
            'size' => Storage::disk('public')->size($file->path),
            'last_modified' => Storage::disk('public')->lastModified($file->path),
            'exists' => Storage::disk('public')->exists($file->path),
        ];

        return response()->json([
            'success' => true,
            'data' => $fileInfo
        ]);
    }
}

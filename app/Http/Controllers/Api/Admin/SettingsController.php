<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use App\Http\Resources\SettingResource;
use App\Models\File;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        cache()->forget('app_settings');
        // Cache all settings for 24 hours
        $settings = Cache::remember('app_settings', now()->addDay(), function () {
            return Setting::get();
        });

        return SettingResource::collection($settings);
        // return response()->json(['success' => true, 'data' => $settings]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSettingRequest $request)
    {
        $setting = Setting::create($request->validated());

        Cache::forget('app_settings');
        return response()->json([
            'success' => true,
            'message' => 'Setting created successfully',
            'data' => new SettingResource($setting)
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        return new SettingResource($setting);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSettingRequest $request, $key)
    {
        $setting = Setting::where('key', $key)->firstOrFail();
        $setting->update($request->validated());

        Cache::forget('app_settings');
        return response()->json([
            'success' => true,
            'message' => 'Setting updated successfully',
            'data' => new SettingResource($setting)
        ]);

    }

    public function uploadImage(Request $request)
    {

        // $request->validate([
        //     'value' => 'required|image|max:2048', // max 2MB
        // ]);

        $setting = Setting::where('key', $request->key)->first();

        if($setting){
            // Handle file upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $file = new File();
                $file->saveFile($image, 'settings_images');
    
                $setting->value = $file->id;
                $setting->is_file = true;
                $setting->save();
            }
        }else{
            $setting = Setting::create([
                'key' => $request->key,
                'value' => '',
                'is_file' => true
            ]);

            // Handle file upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $file = new File();
                $file->saveFile($image, 'settings_images');
                $setting->value = $file->id;
                $setting->save();
            }
        }

        Cache::forget('app_settings');
        return response()->json([
            'success' => true,
            'message' => 'Image uploaded and setting updated successfully',
            'data' => new SettingResource($setting)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($key)
    {
        $setting = Setting::where('key', $key)->firstOrFail();
        $setting->delete();

        Cache::forget('app_settings');
        return response()->json([
            'success' => true,
            'message' => 'Setting deleted successfully'
        ]);
    }

    /**
     * Get setting by key
     */
    public function getByKey(string $key)
    {
        $setting = Setting::where('key', $key)->first();

        if (!$setting) {
            return response()->json([
                'success' => false,
                'message' => 'Setting not found'
            ], Response::HTTP_NOT_FOUND);
        }

        return new SettingResource($setting);
    }

    /**
     * Bulk update settings
     */
    public function bulkUpdate(Request $request)
    {
        $request->validate([
            'settings' => 'required|array',
            'settings.*.key' => 'required|string',
            'settings.*.value' => 'nullable|string',
            'settings.*.is_file' => 'boolean'
        ]);

        $updatedSettings = [];

        foreach ($request->settings as $settingData) {
            $setting = Setting::updateOrCreate(
                ['key' => $settingData['key']],
                [
                    'value' => $settingData['value'] ?? '',
                    'is_file' => $settingData['is_file'] ?? false
                ]
            );
            $updatedSettings[] = $setting;
        }

        Cache::forget('app_settings');

        return SettingResource::collection($updatedSettings);
    }
}

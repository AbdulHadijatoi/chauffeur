<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Admin\SettingsController;
use App\Http\Controllers\Api\Admin\GuidelinesController;
use App\Http\Controllers\Api\Admin\FilesController;
use App\Http\Controllers\Api\Admin\ServicesCategoriesController;
use App\Http\Controllers\Api\Admin\CountriesController;
use App\Http\Controllers\Api\Admin\CitiesController;
use App\Http\Controllers\Api\Admin\CityRoutesController;
use App\Http\Controllers\Api\Admin\ConstantController;
use App\Http\Controllers\Api\Admin\CountryRoutesController;
use App\Http\Controllers\Api\Admin\VehicleTypesController;
use App\Http\Controllers\Api\Admin\LocationsController;
use App\Http\Controllers\Api\Admin\VehiclesController;
use App\Http\Controllers\Api\Admin\VehicleImagesController;
use App\Http\Controllers\Api\Admin\ServicesController;
use App\Http\Controllers\Api\Admin\ServiceTypesController;
use App\Http\Controllers\Api\Admin\VehicleSpecsController;
use App\Http\Controllers\Api\Admin\QuotesController;
use App\Http\Controllers\Api\Admin\UsersController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Authentication routes
Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('logout', [AuthController::class, 'logout']);
        Route::get('me', [AuthController::class, 'me']);
        Route::post('refresh', [AuthController::class, 'refresh']);
    });
});

// Admin routes - protected by authentication and admin middleware
Route::middleware(['auth:sanctum', 'admin'])->prefix('admin')->group(function () {
    
    // Settings management
    Route::prefix('constants')->group(function () {
        Route::post('countries', [ConstantController::class, 'countries']);
        Route::post('cities', [ConstantController::class, 'cities']);
    });
    Route::prefix('settings')->group(function () {
        Route::post('/', [SettingsController::class, 'index']);
        Route::post('create', [SettingsController::class, 'store']);
        Route::post('update/{key}', [SettingsController::class, 'update']);
        Route::post('upload-image', [SettingsController::class, 'uploadImage']);
        // Route::get('/{id}', [SettingsController::class, 'show']);
        Route::post('delete/{key}', [SettingsController::class, 'destroy']);
    });
    
    // Guidelines management
    Route::prefix('guidelines')->group(function () {
        Route::post('/', [GuidelinesController::class, 'index']);
        Route::post('create', [GuidelinesController::class, 'store']);
        Route::post('update/{id}', [GuidelinesController::class, 'update']);
        Route::post('delete/{id}', [GuidelinesController::class, 'destroy']);
    });
    
    // Files management
    Route::apiResource('files', FilesController::class);
    Route::post('files/upload-multiple', [FilesController::class, 'uploadMultiple']);
    Route::get('files/{file}/download', [FilesController::class, 'download']);
    Route::get('files/{file}/info', [FilesController::class, 'info']);
    Route::get('files-types', [FilesController::class, 'getTypes']);
    
    // Services Categories management
    Route::prefix('services-categories')->group(function () {
        Route::post('/', [ServicesCategoriesController::class, 'index']);
        Route::post('store', [ServicesCategoriesController::class, 'store']);
        Route::post('update/{id}', [ServicesCategoriesController::class, 'update']);
        Route::post('delete/{id}', [ServicesCategoriesController::class, 'destroy']);
    });
    
    // Countries management
    Route::apiResource('countries', CountriesController::class);
    Route::get('countries/{country}/cities', [CountriesController::class, 'withCities']);
    
    // Cities management
    Route::apiResource('cities', CitiesController::class);
    Route::get('cities/country/{countryId}', [CitiesController::class, 'getByCountry']);
    Route::get('cities-all', [CitiesController::class, 'getAll']);
    
    // City Routes management
     Route::prefix('city-to-city-routes')->group(function () {
        Route::post('/', [CityRoutesController::class, 'index']);
        Route::post('create', [CityRoutesController::class, 'store']);
        Route::post('update/{id}', [CityRoutesController::class, 'update']);
        Route::post('delete/{id}', [CityRoutesController::class, 'destroy']);
    });
    
    // Country Routes management
    Route::apiResource('country-routes', CountryRoutesController::class);
    Route::get('country-routes/between', [CountryRoutesController::class, 'getRouteBetween']);
    
    // Vehicle Types management
    Route::apiResource('vehicle-types', VehicleTypesController::class);
    
    // Locations management
    Route::apiResource('locations', LocationsController::class);
    
    // Vehicles management
    Route::prefix('vehicles')->group(function () {
        Route::post('/', [VehiclesController::class, 'index']);
        Route::post('create', [VehiclesController::class, 'store']);
        Route::post('update/{vehicle}', [VehiclesController::class, 'update']);
        Route::delete('delete/{vehicle}', [VehiclesController::class, 'destroy']);
    });
    
    // Vehicle Images management
    Route::apiResource('vehicle-images', VehicleImagesController::class);
    Route::post('vehicle-images/upload', [VehicleImagesController::class, 'uploadImage']);
    Route::get('vehicles/{vehicle}/images', [VehicleImagesController::class, 'getVehicleImages']);
    Route::post('vehicle-images/{vehicle_id}/set-primary', [VehicleImagesController::class, 'setPrimary']);
    
    Route::prefix('services')->group(function () {
        Route::post('/', [ServicesController::class, 'index']);
        Route::post('constants', [ServicesController::class, 'constants']);
        Route::post('create', [ServicesController::class, 'store']);
        Route::post('update/{id}', [ServicesController::class, 'update']);
        Route::post('delete/{id}', [ServicesController::class, 'destroy']);
    });
    
    // Service Types management
    Route::apiResource('service-types', ServiceTypesController::class);
    
    // Vehicle Specs management
    Route::apiResource('vehicle-specs', VehicleSpecsController::class);
    Route::get('vehicle-specs/vehicle/{vehicleId}', [VehicleSpecsController::class, 'getSpecsByVehicle']);
    Route::get('vehicle-specs/fuel-types', [VehicleSpecsController::class, 'getAvailableFuelTypes']);
    Route::get('vehicle-specs/transmissions', [VehicleSpecsController::class, 'getAvailableTransmissions']);
    
    // Quotes management
    Route::apiResource('quotes', QuotesController::class);
    Route::get('quotes-statistics', [QuotesController::class, 'statistics']);
    Route::get('quotes-export', [QuotesController::class, 'export']);
    
    // Users management
    Route::apiResource('users', UsersController::class);
    Route::post('users/{user}/toggle-admin', [UsersController::class, 'toggleAdminStatus']);
    Route::post('users/{user}/verify-email', [UsersController::class, 'verifyEmail']);
    Route::get('users-admins', [UsersController::class, 'getAdmins']);
    Route::get('users-regular', [UsersController::class, 'getRegularUsers']);
});

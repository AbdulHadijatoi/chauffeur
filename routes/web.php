<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\StaticPageController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/services/{id}', [ListingController::class, 'index'])->name('listing');
Route::get('/services/{id}/{service_name}', [ListingController::class, 'service_details'])->name('service_details');
Route::get('/faq', [StaticPageController::class, 'faq']);
Route::get('/help', [StaticPageController::class, 'help']);
Route::get('/about-us', [StaticPageController::class, 'aboutUs']);


// settings: (key, value, is_file). add index on the key column
// guidelines: (id, type, title, description). add index on the type column
// files: (path, type). no timestamps and id column. in the model, define saveFile function and also append full_path attribute to return file path url.
// services_categories: (id, name). no timestamps
// countries: (id, name). no timestamps
// cities: (id, name, country_id). no timestamps
// city_routes: (id, from_city_id, to_city_id, duration, distance). no timestamps
// country_routes: (id, from_country_id, to_country_id, duration, distance). no timestamps
// vehicle_types: (id, name). no timestamps
// locations: (id, name). no timestamps
// vehicles: (id, name, passengers, luggage). no timestamps
// vehicle_images: (id, vehicle_id, file_id). include timestamps
// services: (id, name, vehicle_id, description). include timestamps
// service_types: (id, service_id, hour_duration, price). no timestamps
// vehicle_specs: (id, vehicle_id, specs). include timestamps. instead of specs column, create multiple columns, each column for each spec like transmission, mileage, steering etc what ever we have in modern vehicles. I will optionally specs add values for each vehicle.: (I don't want json for specs thats why need separate column for each spec).
// quotes: (name, phone, email, service_id, service_type_id, pickup_date, pickup_time, pickup_location, drop_off_location, total_passengers, note)

// Note, each model that contains file_id must have always include the file path when called. like in the vehicle images, each record must load image_url appended from relation
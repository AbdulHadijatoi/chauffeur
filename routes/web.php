<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListingController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/listing', [ListingController::class, 'index']);

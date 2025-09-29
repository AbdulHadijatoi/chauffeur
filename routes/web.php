<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\StaticPageController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/listing', [ListingController::class, 'index']);
Route::get('/faq', [StaticPageController::class, 'faq']);

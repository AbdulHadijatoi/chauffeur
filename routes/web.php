<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\StaticPageController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/listing', [ListingController::class, 'index'])->name('listing');
Route::get('/faq', [StaticPageController::class, 'faq']);

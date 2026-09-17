<?php

use App\Http\Controllers\SiteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/banner', [SiteController::class, 'banners']);
Route::get('/category/product', [SiteController::class, 'categories']);

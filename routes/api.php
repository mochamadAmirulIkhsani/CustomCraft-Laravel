<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/products', [ProductController::class, 'index'] );
Route::get('/products/{id}', [ProductController::class, 'show'] );
Route::get('/banners', [BannerController::class, 'index'] );
Route::get('/banners/{api}', [BannerController::class, 'show'] );

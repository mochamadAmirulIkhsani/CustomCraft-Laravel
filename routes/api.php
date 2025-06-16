<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/produk', [ProductController::class, 'index'] );
Route::get('/produk/{id}', [ProductController::class, 'show'] );
Route::get('/banner', [BannerController::class, 'index'] );
Route::get('/banner/{api}', [BannerController::class, 'show'] );

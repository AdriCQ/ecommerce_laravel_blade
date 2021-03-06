<?php

use App\Http\Controllers\Shop\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'list']);
Route::get('/cart', [ProductController::class, 'productCart']);
Route::get('/{id}', [ProductController::class, 'details']);

Route::middleware('auth:sanctum')->group(function () {
  Route::post('/', [ProductController::class, 'create']);
  Route::delete('/{id}', [ProductController::class, 'delete']);
  Route::put('/{id}', [ProductController::class, 'update']);
  Route::post('/{id}/image', [ProductController::class, 'uploadMainImage']);
  Route::delete('/{id}/gallery', [ProductController::class, 'restartGallery']);
  Route::post('/{id}/gallery', [ProductController::class, 'uploadGallery']);
});

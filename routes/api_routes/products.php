<?php

use App\Http\Controllers\Shop\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'list']);
Route::post('/{id}/main-image', [ProductController::class, 'uploadMainImage']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/', [ProductController::class, 'create']);
    Route::delete('/{id}', [ProductController::class, 'delete']);
    Route::put('/{id}', [ProductController::class, 'update']);
});

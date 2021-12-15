<?php

use App\Http\Controllers\Shop\DestinationController;
use Illuminate\Support\Facades\Route;

/**
 * Destinations API REST ROUTES
 */
Route::get('/', [DestinationController::class, 'list']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/', [DestinationController::class, 'create']);
    Route::put('/{id}', [DestinationController::class, 'update']);
    Route::delete('/{id}', [DestinationController::class, 'delete']);
});

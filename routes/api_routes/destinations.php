<?php

use App\Http\Controllers\Shop\DestinationController;
use Illuminate\Support\Facades\Route;

/**
 * Destinations API REST ROUTES
 */
Route::post('/', [DestinationController::class, 'create']);
Route::get('/', [DestinationController::class, 'list']);
Route::put('/{id}', [DestinationController::class, 'update']);
Route::delete('/{id}', [DestinationController::class, 'delete']);

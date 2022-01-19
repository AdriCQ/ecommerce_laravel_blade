<?php

use App\Http\Controllers\Shop\OrderController;
use Illuminate\Support\Facades\Route;

Route::post('/', [OrderController::class, 'create']);
Route::get('/find', [OrderController::class, 'find']);

Route::middleware('auth:sanctum')->group(function () {
  Route::get('/', [OrderController::class, 'list']);
  Route::delete('/', [OrderController::class, 'removeAll']);
  Route::delete('/{id}', [OrderController::class, 'remove']);
});

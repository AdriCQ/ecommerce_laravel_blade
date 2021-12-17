<?php

use App\Http\Controllers\Shop\OrderController;
use Illuminate\Support\Facades\Route;

Route::post('/', [OrderController::class, 'create']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/', [OrderController::class, 'list']);
});

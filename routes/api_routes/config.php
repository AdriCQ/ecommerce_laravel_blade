<?php

use App\Http\Controllers\Shop\ConfigController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ConfigController::class, 'get']);
Route::post('/', [ConfigController::class, 'update'])->middleware('auth:sanctum');

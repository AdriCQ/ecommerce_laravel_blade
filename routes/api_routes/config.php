<?php

use App\Http\Controllers\Shop\ConfigController;
use Illuminate\Support\Facades\Route;

Route::post('/', [ConfigController::class, 'update'])->middleware('auth:sanctum');

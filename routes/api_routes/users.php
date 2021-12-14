<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;

/**
 * User API REST ROUTES
 */
Route::post('/login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/', [UserController::class, 'create']);
    Route::delete('/{id}', [UserController::class, 'delete']);
    Route::put('/{id}', [UserController::class, 'update']);
});

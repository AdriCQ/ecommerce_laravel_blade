<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;

/**
 * User API REST ROUTES
 */
Route::post('/login', [UserController::class, 'login']);
Route::post('/contact', [UserController::class, 'contact']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/', [UserController::class, 'list']);
    Route::post('/', [UserController::class, 'create']);
    Route::post('/update-password', [UserController::class, 'updatePassword']);
    Route::delete('/{id}', [UserController::class, 'delete']);
    Route::put('/{id}', [UserController::class, 'update']);
});

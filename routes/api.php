<?php

use Illuminate\Support\Facades\Route;

/**
 * -----------------------------------------
 *	API REST
 * -----------------------------------------
 */

// User Routes
Route::prefix('/destinations')->group(__DIR__ . '/api_routes/destinations.php');
Route::prefix('/users')->group(__DIR__ . '/api_routes/users.php');

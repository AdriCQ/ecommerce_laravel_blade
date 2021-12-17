<?php

use Illuminate\Support\Facades\Route;

/**
 * -----------------------------------------
 *	API REST
 * -----------------------------------------
 */

// User Routes
Route::prefix('/destinations')->group(__DIR__ . '/api_routes/destinations.php');
Route::prefix('/configs')->group(__DIR__ . '/api_routes/config.php');
Route::prefix('/products')->group(__DIR__ . '/api_routes/products.php');
Route::prefix('/users')->group(__DIR__ . '/api_routes/users.php');

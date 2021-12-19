<?php

use App\Http\Controllers\ViewController;
use App\Models\Shop\Product;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ViewController::class, 'home'])->name('home');

Route::get('/cart', [ViewController::class, 'cart'])->name('cart');
Route::get('/product-details/{id}', [ViewController::class, 'productDetails'])->name('product-details');

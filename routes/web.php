<?php

use App\Http\Controllers\ViewController;
use App\Models\User;
use Illuminate\Http\Request;
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

Route::get('/upload-test', function () {
  return view('upload');
});
Route::post('/upload-test', [ViewController::class, 'uploadTest'])->name('upload-test');

Route::get('/cart', [ViewController::class, 'cart'])->name('cart');
Route::post('/contact', [ViewController::class, 'contact'])->name('contact');
Route::get('/find', [ViewController::class, 'find'])->name('find');
Route::post('/find', [ViewController::class, 'findAction'])->name('find-action');
Route::get('/product-details/{id}', [ViewController::class, 'productDetails'])->name('product-details');
Route::get('/order-completed', [ViewController::class, 'orderCompleted'])->name('order-completed');
Route::get('/order/{id}', [ViewController::class, 'orderDetails'])->name('order-details');

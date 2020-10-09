<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/products', [App\Http\Controllers\ProductsController::class, 'create']);

Route::post('/products', [App\Http\Controllers\ProductsController::class, 'store'])->name('add_new_product');

Route::get('/products/{id}', [App\Http\Controllers\ProductsController::class, 'show']);

Route::get('/products/edit/{id}', [App\Http\Controllers\ProductsController::class, 'edit']);

Route::post('/products/edit/{id}', [App\Http\Controllers\ProductsController::class, 'update'])->name('update_product');

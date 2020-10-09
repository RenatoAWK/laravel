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

Route::get('/products', [App\Http\Controllers\ProductsController::class, 'create'])->middleware('role:admin');

Route::post('/products', [App\Http\Controllers\ProductsController::class, 'store'])->name('add_new_product')->middleware('role:admin');

Route::get('/products/{id}', [App\Http\Controllers\ProductsController::class, 'show'])->middleware('role:admin');

Route::get('/products/edit/{id}', [App\Http\Controllers\ProductsController::class, 'edit'])->middleware('role:admin');

Route::post('/products/edit/{id}', [App\Http\Controllers\ProductsController::class, 'update'])->name('update_product')->middleware('role:admin');

Route::get('/products/delete/{id}', [App\Http\Controllers\ProductsController::class, 'remove'])->middleware('role:admin');

Route::post('/products/delete/{id}', [App\Http\Controllers\ProductsController::class, 'destroy'])->name('destroy_product')->middleware('role:admin');

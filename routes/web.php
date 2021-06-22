<?php

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

Route::get('/products', [\App\Http\Controllers\ProductController::class, 'index'])->name('products');
Route::get('/product/{id}', [\App\Http\Controllers\ProductController::class, 'show']);
Route::get('/add', [\App\Http\Controllers\ProductController::class, 'create']);
Route::post('/add', [\App\Http\Controllers\ProductController::class, 'store']);
Route::get('/product/{id}/edit', [\App\Http\Controllers\ProductController::class, 'edit']);
Route::put('/product/{id}', [\App\Http\Controllers\ProductController::class, 'update']);
Route::get('/delete/{id}', [\App\Http\Controllers\ProductController::class, 'destroy']);


<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layouts.index');
});

Route::get('/brands', [\App\Http\Controllers\BrandController::class, 'index'])
    ->name('brands.index');

Route::get('/brands/create', [\App\Http\Controllers\BrandController::class, 'create'])
    ->name('brands.create');

Route::post('/brands/create', [\App\Http\Controllers\BrandController::class, 'store'])
    ->name('brands.store');

Route::get('brands/{brand}/edit', [\App\Http\Controllers\BrandController::class, 'edit'])
    ->name('brands.edit');

Route::put('brands/{brand}/edit', [\App\Http\Controllers\BrandController::class, 'update'])
    ->name('brands.update');

Route::delete('/brands/{brand}', [\App\Http\Controllers\BrandController::class, 'destroy'])
    ->name('brands.destroy');

Route::get('/products', [\App\Http\Controllers\ProductController::class, 'index'])
    ->name('products.index');

Route::get('/products/create', [\App\Http\Controllers\ProductController::class, 'create'])
    ->name('products.create');

Route::post('/products/create', [\App\Http\Controllers\ProductController::class, 'store'])
    ->name('products.store');

Route::get('/products/{product}/edit', [\App\Http\Controllers\ProductController::class, 'edit'])
    ->name('products.edit');

Route::put('/products/{product}/edit', [\App\Http\Controllers\ProductController::class, 'update'])
    ->name('products.update');

Route::delete('/products/{product}', [\App\Http\Controllers\ProductController::class, 'destroy'])
    ->name('products.destroy');

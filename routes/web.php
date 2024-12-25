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
    return view('welcome');
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

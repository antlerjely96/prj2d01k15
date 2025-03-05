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
    return bcrypt('123456');
});

Route::get('/login', [\App\Http\Controllers\AdminController::class, 'login'])
    ->name('login');
Route::post('/login', [\App\Http\Controllers\AdminController::class, 'loginProcess'])
    ->name('loginProcess');
Route::get('/logout', [\App\Http\Controllers\AdminController::class, 'logout'])
    ->name('logout');

Route::middleware('adminLoginMiddleware')->prefix('admin')->group(function () {
    Route::prefix('/brands')->group(function (){
        Route::get('/', [\App\Http\Controllers\BrandController::class, 'index'])
            ->name('brands.index');
        Route::get('/create', [\App\Http\Controllers\BrandController::class, 'create'])
            ->name('brands.create');
        Route::post('/create', [\App\Http\Controllers\BrandController::class, 'store'])
            ->name('brands.store');
        Route::get('/{brand}/edit', [\App\Http\Controllers\BrandController::class, 'edit'])
            ->name('brands.edit');
        Route::put('/{brand}/edit', [\App\Http\Controllers\BrandController::class, 'update'])
            ->name('brands.update');
        Route::delete('/{brand}', [\App\Http\Controllers\BrandController::class, 'destroy'])
            ->name('brands.destroy');
    });

    Route::prefix('products')->group(function (){
        Route::get('/', [\App\Http\Controllers\ProductController::class, 'index'])
            ->name('products.index');
        Route::get('/create', [\App\Http\Controllers\ProductController::class, 'create'])
            ->name('products.create');
        Route::post('/create', [\App\Http\Controllers\ProductController::class, 'store'])
            ->name('products.store');
        Route::get('/{product}/edit', [\App\Http\Controllers\ProductController::class, 'edit'])
            ->name('products.edit');
        Route::put('/{product}/edit', [\App\Http\Controllers\ProductController::class, 'update'])
            ->name('products.update');
        Route::delete('/{product}', [\App\Http\Controllers\ProductController::class, 'destroy'])
            ->name('products.destroy');
    });
});


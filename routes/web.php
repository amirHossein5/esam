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
    return view('app.index');
})->name('app.index');

Route::name('app.service.')->prefix('service')->group(function () {

    Route::get('/', function () {
        return view('app.service.index');
    })->name('index');

    Route::get('/show/10', function () {
        return view('app.service.show');
    })->name('index');

});

Route::name('product.')->group(function () {
    Route::get('item/10/mac', function () {
        return view('app.products.show');
    })->name('item');

    Route::get('search', function () {
        return view('app.products.search');
    })->name('item');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

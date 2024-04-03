<?php

use App\Http\Controllers\AdvertisementController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('ads.index');
});

Route::controller(AdvertisementController::class)
    ->name('ads.')
    ->group(function () {
        Route::get('/advertisements', 'index')->name('index');
        Route::get('/advertisements/create', 'create')->name('create');
        Route::post('/advertisements', 'store')->name('store');
        Route::get('/advertisements/{advertisement}', 'show')->name('show');
        // Route::name('ads.')->group(function () {
        // });
    });

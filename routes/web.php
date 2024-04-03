<?php

use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('ads.index');
});

Route::controller(AdvertisementController::class)
    ->name('ads.')
    ->group(function () {
        Route::get('/advertisements', 'index')->name('index');
        Route::get('/advertisements/{advertisement}', 'show')->name('show');

        Route::middleware('auth')->group(function () {
            Route::get('/advertisements/create', 'create')->name('create');
            Route::post('/advertisements', 'store')->name('store');
        });
    });

Route::controller(UserController::class)
    ->name('users.')
    ->group(function () {
        Route::middleware('auth')->group(function () {
            Route::post('/logout', 'logout')->name('logout');
        });

        Route::middleware('guest')->group(function () {
            Route::get('/register', 'create')->name('create');
            Route::post('/users', 'store')->name('store');

            Route::get('/login', 'login')->name('login');
            Route::post('/users/authenticate', 'authenticate')->name('authenticate');
        });
    });

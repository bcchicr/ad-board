<?php

use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\PreservePreviousUrl;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('ads.index');
});

Route::controller(AdvertisementController::class)
    ->name('ads.')
    ->group(function () {
        Route::middleware('auth')->group(function () {
            Route::get('/advertisements/create', 'create')->name('create');
            Route::post('/advertisements', 'store')->name('store');
        });

        Route::middleware('admin')->group(function () {
            Route::get('/advertisements/waiting', 'waiting')->name('waiting');
            Route::patch('/advertisements/{advertisement}/publish', 'publish')->name('publish');
            Route::delete('/advertisements/{advertisement}/decline', 'decline')->name('decline');
            Route::delete('/advertisements/{advertisement}', 'destroy')->name('destroy');
        });

        Route::get('/advertisements/{advertisement}', 'show')->name('show')->middleware(PreservePreviousUrl::class);
        Route::get('/advertisements/{superCategory?}/{category?}', 'index')->name('index');
    });

Route::controller(UserController::class)
    ->name('users.')
    ->group(function () {
        Route::middleware('auth')->group(function () {
            Route::post('/logout', 'logout')->name('logout');
            Route::get('/profile', 'show')->name('show');
        });

        Route::middleware('guest')->group(function () {
            Route::get('/register', 'create')->name('create');
            Route::post('/users', 'store')->name('store');

            Route::get('/login', 'login')->name('login');
            Route::post('/users/authenticate', 'authenticate')->name('authenticate');
        });
    });

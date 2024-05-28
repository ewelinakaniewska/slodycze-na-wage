<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CandyController;
use Illuminate\Support\Facades\Route;

Route::controller(CandyController::class)->group(function (){
    Route::get('/', 'index')->name('candies.index');
});


Route::controller(AuthController::class)->group(function () {
    Route::get('/auth/login', 'login')->name('login');
    Route::post('/auth/login', 'authenticate')->name('login.authenticate');
    Route::get('/auth/logout', 'logout')->name('logout');
});

Route::resource('candies', CandyController::class);
Route::resource('suppliers', SupplierController::class);


<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CandyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\Auth;

Route::controller(CandyController::class)->group(function (){
    Route::get('/', 'index')->name('candies.index');
});


Route::controller(AuthController::class)->group(function () {
    Route::get('/auth/login', 'login')->name('login');
    Route::post('/auth/login', 'authenticate')->name('login.authenticate');
    Route::get('/auth/logout', 'logout')->name('logout');
});



Route::middleware([IsAdmin::class])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::resource('suppliers', SupplierController::class);
    Route::resource('candies', CandyController::class);
});

Route::middleware([Auth::class])->group(function () {
    Route::resource('orders', OrderController::class);
    Route::resource('users', UserController::class);
});

Route::get('/suppliers', [SupplierController::class, 'index'])->withoutMiddleware('isAdmin')->name('suppliers.index');
Route::get('/candies', [CandyController::class, 'index'])->withoutMiddleware('isAdmin')->name('candies.index');
Route::get('/candies/{candy}', [CandyController::class, 'show'])->withoutMiddleware('isAdmin')->name('candies.show');



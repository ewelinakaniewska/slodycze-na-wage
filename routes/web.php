<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CandyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\Auth;



Route::get('/', function () {
    return "LOG: Strona glowna dziala bez middleware. Jesli to widzisz, winny jest CandyController lub Middleware.";
});

Route::get('/debug-session', function () {
    return response()->json([
        'session_id' => session()->getId(),
        'user' => auth()->user(),
        'url' => config('app.url'),
    ]);
});




// Route::get('/', [CandyController::class, 'index'])->name('candies.index');

// Route::get('/candies', [CandyController::class, 'index']);
// Route::get('/candies/{candy}', [CandyController::class, 'show'])->name('candies.show');
// Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');

// Route::get('/faq', function () {
//     return view('faq');
// })->name('faq');

// Route::controller(AuthController::class)->group(function () {
//     Route::get('/auth/login', 'login')->name('login');
//     Route::post('/auth/login', 'authenticate')->name('login.authenticate');
//     Route::get('/auth/logout', 'logout')->name('logout');
//     Route::get('/auth/register', 'registerView')->name('register');
//     Route::post('/auth/register', 'register')->name('register.register');
// });

// Route::middleware([IsAdmin::class])->group(function () {
//     Route::get('/users-list', [UserController::class, 'index'])->name('users.index');
//     Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

//     Route::resource('suppliers', SupplierController::class)->except(['index']);

//     Route::resource('candies', CandyController::class)->except(['index', 'show']);
// });

// Route::middleware([Auth::class])->group(function () {
//     Route::resource('orders', OrderController::class);
//     Route::resource('users', UserController::class)->except(['index']);
// });

<?php

use App\Http\Controllers\AmenityController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\client\ClientController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ViewController;
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

Route::get('/', [ClientController::class, 'index'])->name('client.index');

Route::get('/register', [RegisterController::class, 'index'])->name('register');

Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
], function () {

    Route::resource('hotels', HotelController::class);

    Route::resource('rooms', RoomController::class);

    Route::resource('amenities', AmenityController::class);

    Route::resource('payment_methods', PaymentMethodController::class);

    Route::resource('views', ViewController::class);

    Route::resource('posts', PostController::class);

});

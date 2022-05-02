<?php

use App\Http\Controllers\Admin\CatsController;
use App\Http\Controllers\Admin\CouponsController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StoresController;
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

Route::group(['middleware' => 'loggedIn'], function () {
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('customLogin');
});

Route::group(['middleware' => 'checkAuth'], function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/coupons', [CouponsController::class, 'index']);
    Route::get('/add-coupon', [CouponsController::class, 'add']);
    Route::get('/stores', [StoresController::class, 'index']);
    Route::get('/add-store', [StoresController::class, 'add']);
    Route::get('/cats', [CatsController::class, 'index']);
    Route::get('/add-cat', [CatsController::class, 'add']);
    Route::get('/edit-cat/{id}', [CatsController::class, 'edit']);
});

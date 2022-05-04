<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CatsController;
use App\Http\Controllers\Admin\CouponsController as AdminCouponsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SlidesController;
use App\Http\Controllers\Admin\StoresController as AdminStoresController;
use App\Http\Controllers\CarouselsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CouponsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StoresController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/stores', [StoresController::class, 'stores']);
Route::get('/common-stores/{limit}', [StoresController::class, 'commonStores']);
Route::get('/stores/{id}', [StoresController::class, 'getStore']);

Route::get('/coupons/{limit}', [CouponsController::class, 'coupons']);
Route::get('/allcoupons', [CouponsController::class, 'allcoupons']);
Route::get('/get-coupons/{storeID}', [CouponsController::class, 'getCoupon']);
Route::get('/coupon/{couponID}', [CouponsController::class, 'coupon']);
Route::get('/coupons-by-cat/{cat}', [CouponsController::class, 'couponsByCat']);
Route::get('/coupons-by-subcat/{subcat}', [CouponsController::class, 'couponsBySubCat']);

Route::get('/categories', [CategoriesController::class, 'categories']);
Route::get('/categories-limit/{limit}', [CategoriesController::class, 'limit']);

Route::get('/search/{keyword}', [SearchController::class, 'search']);
Route::get('/search-store/{keyword}', [SearchController::class, 'searchStores']);

Route::get('/carousels', [CarouselsController::class, 'fetch']);

Route::group(['prefix' => 'admin'], function () {
    Route::post('/auth', [AuthController::class, 'login']);
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/coupons', [AdminCouponsController::class, 'index']);
    Route::post('/add-coupon', [AdminCouponsController::class, 'add']);
    Route::post('/delete-coupon', [AdminCouponsController::class, 'delete']);
    Route::get('/stores', [AdminStoresController::class, 'index']);
    Route::post('/add-store', [AdminStoresController::class, 'add']);
    Route::post('/delete-store', [AdminStoresController::class, 'delete']);
    Route::get('/cats', [CatsController::class, 'index']);
    Route::post('/subcats', [CatsController::class, 'getSubCats']);
    Route::post('/add-cat', [CatsController::class, 'add']);
    Route::post('/add-subcat', [CatsController::class, 'addSubCat']);
    Route::post('/delete-subcat', [CatsController::class, 'deleteSubCat']);
    Route::post('/edit-cat', [CatsController::class, 'edit']);
    Route::get('/one-cat/{id}', [CatsController::class, 'oneCat']);
    Route::get('/slides', [SlidesController::class, 'index']);
    Route::post('/delete-slide', [SlidesController::class, 'delete']);
    Route::post('/add-slide', [SlidesController::class, 'add']);
    Route::post('/change-password', [AccountController::class, 'changePassword']);
});

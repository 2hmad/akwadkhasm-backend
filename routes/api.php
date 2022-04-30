<?php

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

Route::get('/carousels', [CarouselsController::class, 'fetch']);

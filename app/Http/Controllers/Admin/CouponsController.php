<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Stores;
use Illuminate\Http\Request;

class CouponsController extends Controller
{
    public function index()
    {
        return view('coupons');
    }
    public function add()
    {
        $getStores = Stores::get();
        $getCats = Categories::get();
        return view('add-coupon', compact('getStores', 'getCats'));
    }
}

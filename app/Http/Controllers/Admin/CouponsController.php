<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CouponsController extends Controller
{
    public function index()
    {
        return view('coupons');
    }
    public function add()
    {
        return view('add-coupon');
    }
}

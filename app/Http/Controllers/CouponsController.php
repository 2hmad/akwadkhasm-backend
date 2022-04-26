<?php

namespace App\Http\Controllers;

use App\Models\Coupons;
use Illuminate\Http\Request;

class CouponsController extends Controller
{
    public function coupons(Request $request, $limit)
    {
        return Coupons::limit($limit)->with('store')->get();
    }
}

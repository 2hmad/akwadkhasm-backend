<?php

namespace App\Http\Controllers;

use App\Models\Coupons;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search($keyword)
    {
        return Coupons::with('store')->where('title', 'like', '%' . $keyword . '%')->orWhere('coupon', 'like', '%' . $keyword . '%')->get();
    }
}

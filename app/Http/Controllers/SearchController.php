<?php

namespace App\Http\Controllers;

use App\Models\Coupons;
use App\Models\Stores;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search($keyword)
    {
        Coupons::with('store')->where('title', 'like', '%' . $keyword . '%')->orWhere('coupon', 'like', '%' . $keyword . '%')->get();
    }
    public function searchStores($keyword)
    {
        return Stores::where('title', 'like', '%' . $keyword . '%')->get();
    }
}

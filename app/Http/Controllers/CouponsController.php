<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Coupons;
use Illuminate\Http\Request;

class CouponsController extends Controller
{
    public function coupon($couponID)
    {
        return Coupons::where('id', $couponID)->with('store')->first();
    }
    public function coupons(Request $request, $limit)
    {
        return Coupons::limit($limit)->with('store')->get();
    }
    public function allcoupons()
    {
        return Coupons::orderBy('id', 'DESC')->with('store')->get();
    }
    public function getCoupon($storeID)
    {
        return Coupons::where('store', $storeID)->with('store')->get();
    }
    public function couponsByCat($cat)
    {
        $getCat = Categories::where('title_en', $cat)->first();
        return Coupons::where('category_id', $getCat->id)->with('store')->get();
    }
    public function couponsBySubCat($subcat)
    {
        return Coupons::where('subcategory_id', $subcat)->with('store')->get();
    }
}

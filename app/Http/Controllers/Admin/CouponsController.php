<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Coupons;
use App\Models\Stores;
use Illuminate\Http\Request;

class CouponsController extends Controller
{
    public function index()
    {
        return Coupons::orderBy('id', 'DESC')->with('store')->get();
    }
    public function add(Request $request)
    {
        return Coupons::updateOrCreate([
            'title' => $request->title,
            'type' => $request->type,
            'coupon' => $request->coupon,
            'offer_link' => $request->offer_link,
            "store" => $request->store,
            "category_id" => $request->cat,
            "subcategory_id" => $request->subcat,
            "date" => date('Y-m-d')
        ]);
    }
    public function delete(Request $request)
    {
        return Coupons::where([
            'id' => $request->id,
        ])->delete();
    }
}

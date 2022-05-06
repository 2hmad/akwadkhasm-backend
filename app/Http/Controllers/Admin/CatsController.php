<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Coupons;
use App\Models\SubCategories;
use Illuminate\Http\Request;

class CatsController extends Controller
{
    public function index()
    {
        return Categories::orderBy('id', 'DESC')->get();
    }
    public function delete(Request $request)
    {
        Categories::where('id', $request->id)->delete();
        Coupons::where('category_id', $request->id)->delete();
        SubCategories::where('cat_id', $request->id)->delete();
    }
    public function getSubCats(Request $request)
    {
        return SubCategories::where('cat_id', $request->cat_id)->get();
    }
    public function oneCat($id)
    {
        return Categories::where('id', $id)->with('subcategory')->first();
    }
    public function add(Request $request)
    {
        return Categories::updateOrCreate([
            'title' => $request->title
        ]);
    }
    public function addSubCat(Request $request)
    {
        return SubCategories::updateOrCreate([
            'title' => $request->title,
            'cat_id' => $request->cat_id
        ]);
    }
    public function deleteSubCat(Request $request)
    {
        return SubCategories::where('id', $request->id)->delete();
    }
    public function edit(Request $request)
    {
        return Categories::where('id', $request->id)->update([
            'title' => $request->title
        ]);
    }
}

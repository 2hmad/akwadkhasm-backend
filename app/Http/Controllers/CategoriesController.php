<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function categories()
    {
        return Categories::with('subcategory')->get();
    }
    public function limit($limit)
    {
        return Categories::limit($limit)->get();
    }
}

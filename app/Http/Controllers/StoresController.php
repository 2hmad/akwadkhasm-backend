<?php

namespace App\Http\Controllers;

use App\Models\Stores;
use Illuminate\Http\Request;

class StoresController extends Controller
{
    public function stores()
    {
        return Stores::get();
    }
    public function getStore(Request $request, $id)
    {
        return Stores::where('id', $id)->first();
    }
}

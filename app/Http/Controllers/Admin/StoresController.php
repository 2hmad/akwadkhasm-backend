<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoresController extends Controller
{
    public function index()
    {
        return view('stores');
    }
    public function add()
    {
        return view('add-store');
    }
}

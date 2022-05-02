<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CatsController extends Controller
{
    public function index()
    {
        return view('categories');
    }
    public function add()
    {
        return view('add-cat');
    }
    public function edit($id)
    {
        return view('edit-cat');
    }
}

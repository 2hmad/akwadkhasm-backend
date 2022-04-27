<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarouselsController extends Controller
{
    public function fetch()
    {
        return DB::table('carousel')->orderBy('id', 'DESC')->get();
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $checkEmail = DB::table('admins')->where('email', $request->email)->first();
        if ($checkEmail !== null) {
            return $checkEmail;
        } else {
            return response()->json('البريد الالكتروني غير صحيح', 404);
        }
    }
}

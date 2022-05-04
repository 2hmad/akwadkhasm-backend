<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function changePassword(Request $request)
    {
        $token = $request->header('token');
        if ($token) {
            $getUser = DB::table('admins')->where('token', $token)->first();
            if (Hash::check($request->oldPassword, $getUser->password)) {
                return DB::table('admins')->where('token', $token)->update([
                    'password' => Hash::make($request->newPassword)
                ]);
            } else {
                return response()->json('كلمة المرور القديمة غير صحيحة', 404);
            }
        }
    }
}

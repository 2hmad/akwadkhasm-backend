<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = Admins::where('email', '=', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('email', $user->email);
                return redirect()->to('dashboard')->withSuccess('Logged-in');
            } else {
                return redirect('/')->with('fail-password', 'كلمة المرور غير صحيحة');
            }
        } else {
            return redirect('/')->with('fail-email', 'البريد الالكتروني غير صحيح');
        }
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('/');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login()
    {
        $credentials = request(['username', 'password']);
        if (Auth::guard('web')->attempt($credentials))
        {
            $user = Auth::guard('web')->user();
            if ($user->roles->pluck('name'))
            {
                Auth::shouldUse('web');
                return redirect()->route('dashboard');
            }else{
                Auth::guard('web')->logout();
                return redirect()->back()->withErrors(['status' => 'Ushbu dasturga kirishga ruxsat berilmagan']);
            }
        }else{
            return redirect()->back()->withErrors(['status' => 'Login yoki parolni kiritishda xatolik!']);
        }
    }
}

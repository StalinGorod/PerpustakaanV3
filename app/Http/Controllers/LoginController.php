<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function proseslogin(Request $request)
    {
        if (Auth::attempt(
            [
                'username' => $request->username,
                'password' => $request->password
            ]
        )) {
            $request->session()->put('username', Auth::user()->username);
            $request->session()->regenerate();
            return redirect('/dashboard');
        } else {
            return redirect('/');
        }
    }

    public function logout(Request $request)
    {
       Auth::logout();
       $request->session()->forget('username');
       $request->session()->invalidate();
       return redirect('/'); 
    }
}

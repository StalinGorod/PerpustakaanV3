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
            return redirect()
        }
    }

    public function logout(Request $request)
    {
    }
}

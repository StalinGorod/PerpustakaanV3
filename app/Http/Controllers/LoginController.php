<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function proseslogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:6',
        ]);

        $user = UserModel::where([
            'username' => $request->username
        ])->get();

        if (count($user) > 0) {
            if (Hash::check($request->password, $user[0]->password)) {
                $request->session()->put('login', '1');
                $request->session()->put('username', $user[0]->username);
                $request->session()->put('level', $user[0]->level);
                return redirect('/dashboard');
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget(['login','username','level']);
        $request->session()->flush();

        return redirect('/');
    }
}

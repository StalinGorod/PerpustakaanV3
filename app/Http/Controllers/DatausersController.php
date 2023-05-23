<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class DatausersController extends Controller
{
    public function index()
    {
        $user = UserModel::get();

        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('datausers', compact('user'));

    }

    public function tambah()
    {
        return view('tambahuser');
    }

    public function userstore(Request $request)
    {

        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|min:6',
            'level' => 'required'
        ]);

        UserModel::insert([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'level' => $request->level
        ]);

        return redirect('/datausers')->with('success', 'Data berhasil ditambah');
    }

    public function delete($id)
    {
        UserModel::where('user_id', $id)->delete();
        return redirect('/datausers');
    }

    public function edit($id)
    {
        $user = UserModel::where('user_id', $id)->get();

        return view('edituser', compact('user'));
    }

    public function editusers(Request $request, $id)
    {
        $request->validate([
            'username' => 'required',
            'level' => 'required'
        ]);

        if($request->password==null){
        UserModel::where('user_id', $id)->update([
            'username' => $request->username,
            'level' => $request->level
        ]);
        }else{
            UserModel::where('user_id', $id)->update([
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'level' => $request->level
            ]);
        }

        return redirect('/datausers')->with('success', 'Data berhasil diubah');
    }
}


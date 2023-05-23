<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DatabukuController extends Controller
{
    public function index(){
        return view('databuku');
    }
}

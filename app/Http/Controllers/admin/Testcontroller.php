<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Testcontroller extends Controller
{
    function index(){
        return redirect()->back()->with('msg', 'nice');
    }

    function session(){
        return view('admin.test');
    }
}

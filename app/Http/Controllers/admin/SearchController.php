<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function searchCategories(Request $request)
    {
        $s=Categories::where('name','LIKE','%'.$request->name.'%')->select('id','name')->get();
      
        return json_encode($s);
       
    }
}

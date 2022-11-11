<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Jobs;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //

    public function searchByCategory($category_id)
    {
        # code...
        $jobs=Jobs::where('categories_id',$category_id)->paginate(5);
        $categories=Categories::with('jobs')->get();
        return view('user.searchResult',compact('jobs','categories'));
    }
    public function searchByKeyword(Request $request)
    {
        # code...
        $key=filter_var($request->search,FILTER_SANITIZE_STRING);
        $jobs=Jobs::where('title','LIKE','%'.$key.'%')->paginate(5);
        $categories=Categories::with('jobs')->get();
        return view('user.searchResult',compact('jobs','categories'));
    }
}

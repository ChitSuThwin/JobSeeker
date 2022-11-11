<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Employee;
use App\Models\EmployeeCategory;
use App\Models\Jobs;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    function index(){
        $jobs = Jobs::where('is_display','1')->orderBy('id','DESC')->take(5)->get();
        $categories=Categories::with('jobs')->get();
        
        // $employee_categories=Employee::with('categories','categories.jobs')->take(5)->get();
        return view('user.index', compact('jobs','categories'));
    }
    function jobs(){
        $j = Jobs::where('is_display','1')->orderBy('id','DESC')->get();
        $jobs = Jobs::where('is_display','1')->orderBy('id','DESC')->paginate(10);
        $categories=Categories::with('jobs')->get();
        
        // $employee_categories=Employee::with('categories','categories.jobs')->take(5)->get();
        return view('user.jobs', compact('j','jobs','categories'));
    }
    function about(){
      
        
        // $employee_categories=Employee::with('categories','categories.jobs')->take(5)->get();
        return view('user.about');
    }
    function details($id){
        $job = Jobs::where('id',$id)->get();
        $categories=Categories::with('jobs')->get();
        return view('user.jobs_details', compact('job','categories'));
    }
    
}

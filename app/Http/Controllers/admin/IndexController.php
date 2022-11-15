<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Jobs;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    function index(){
        $employee=Employee::with('categories')->orderBy('id','DESC')->take(10)->get();
        $currentDateTime = Carbon::now();
        $newDateTime = Carbon::now()->addDays(7);
        $jobs=Jobs::with('employees')->whereBetween('end_date', [$currentDateTime, $newDateTime])->get();
       

      
        return view('admin.index',compact('employee','jobs'));
    }
}

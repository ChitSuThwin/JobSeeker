<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Notifications;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    //
    function read($id){
        $noti = Notifications::findOrFail($id);
        $noti->is_read = '1';
        $noti->save();
        return redirect()->route('admin.jobs.show', $noti->jobs_id)->with('noti','ok');
    }
    function getLatest(){
        $noti =Notifications::with('jobs', 'employee')->latest()->first();
        return response()->json($noti);
    }
    public function getCount()
    {
        # code...
    $noti = Notifications::where('is_read', '0')->get();
      
        return response()->json($noti);
        
    }
   
}

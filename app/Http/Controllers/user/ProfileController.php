<?php

namespace App\Http\Controllers\user;

use App\Events\SendNoti;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Employee;
use App\Models\JobsEmployee;
use App\Models\Notifications;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    function index(){
        $categories=Categories::all();
        return view('user.profile.index',compact('categories'));
    }
    
  function related_jobs($id)
  {
    $employee_jobs=Employee::where('id',$id)->with('categories','categories.jobs')->take(5)->get();
    return view('user.index', compact('employee_jobs'));
  }
    function update($id, Request $request){
       
        $v = Validator::make($request->all(),[
            'name' => 'required|string|min:3',
            'phone' => 'required|string',
            'password' => 'string|min:5',
            'address' => 'required|string',
            'description' => 'required|string',
            // 'cv' => 'file|mimes:pdf,docx,docs',
            // 'pp' => 'image|mimes:png,jpg,jpeg,gif,svg,webp',
        ]);
        if($v->fails()){
            return back()->withErrors($v->errors())->withInput($request->all());
        }

        try{
            $employee = Employee::findOrFail($id);
            $name = filter_var($request->name, FILTER_SANITIZE_STRING);
            $email=filter_var($request->email,FILTER_SANITIZE_EMAIL);
            $phone = filter_var($request->phone, FILTER_SANITIZE_STRING);
            $password = password_hash(filter_var($request->password, FILTER_SANITIZE_STRING), PASSWORD_BCRYPT);
            $address = filter_var($request->address, FILTER_SANITIZE_STRING);
            $description = filter_var($request->description, FILTER_SANITIZE_STRING);
      
            if($employee->email == $email)
            {
            $employee->update(
                [
                    'name'=>$name,
                    'phone'=>$phone,
                    'password'=>$password,
                    'address'=>$address,
                    'description'=>$description,

                ]);
            }
            else
            
                {
                    $employee->update(
                        [
                            'name'=>$name,
                            'email'=>$email,
                            'phone'=>$phone,
                            'password'=>$password,
                            'address'=>$address,
                            'description'=>$description,
        
                        ]);
                    }
            
                $employee->categories()->attach($request->categories);

            
                return back();
        }
    catch(Exception $e){
            dd($e->getMessage());
        }
    }

    function resume($id, Request $request){
        $v = Validator::make($request->all(),[
            'resume' => 'file|mimes:pdf,docx,docs',
           
        ]);
        if($v->fails()){
            return back()->withErrors($v->errors())->withInput($request->all());
        }

        try{
           
          
            $jobId=$request->jobId;
             $fileName = time().$request->resume->GetClientOriginalName();  
             
             $employee = Employee::findOrFail($id);
           
             if(!empty($employee->resume))
             {
                unlink(public_path("resume\\".$employee->resume));
             }
             $request->resume->move(public_path('resume'), $fileName);
             $employee->resume= $fileName;
             $employee->save();
            if(!$employee->jobs->contains($jobId))
            {
                $employee->jobs()->attach($jobId);
                Notifications::create(
                    [
                        'jobs_id'=>$jobId,
                        'employee_id'=>$id
                    ]
                    );
             
            }
          
        
             broadcast(new SendNoti('Job Applied'));
             
                return back()->with('msg','Job Applied Successfully');
        

        }catch(Exception $e){
            dd($e->getMessage());
        }
    }
}

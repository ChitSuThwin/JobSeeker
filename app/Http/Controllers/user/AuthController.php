<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Mail\VerifyUser;
use App\Models\Employee;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    function signup(Request $request){
        $v = Validator::make($request->all(), [
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:employee',
            'phone' => 'required|string|unique:employee',
            'password' => 'required|string|min:8',
            'con_password' => 'required|string|same:password'
        ]);
        if($v->fails()){
            return back()->withErrors($v->errors())->withInput($request->all())->with('signup_error','ok');
        }
        try{
            $name = filter_var($request->name, FILTER_SANITIZE_STRING);
            $email = filter_var($request->email, FILTER_SANITIZE_EMAIL);
            $phone = filter_var($request->phone, FILTER_SANITIZE_STRING);
            $password = password_hash(filter_var($request->password, FILTER_SANITIZE_STRING), PASSWORD_BCRYPT);
            Employee::create([
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'password' => $password,
                'verify_code' => Str::random(20),
            ]);
            Auth::guard('employee')->attempt([
                'email' => $email,
                'password' => $request->password,
            ]);
            return redirect()->route('profile');
        }catch(Exception $e){
            dd($e->getMessage());
        }
    }
    function signin(Request $request){
        $v = Validator::make($request->all(), [
            'name' => 'required|string',
            'password' => 'required|string',
        ]);
        if($v->fails()){
            return back()->with('signin_error', 'Email or Password Wrong');
        }
        try{
            $cre_1 = [
                'email' => filter_var($request->name, FILTER_SANITIZE_EMAIL),
                'password' => filter_var($request->password, FILTER_SANITIZE_STRING),
            ];
            $cre_2 = [
                'phone' => filter_var($request->name, FILTER_SANITIZE_STRING),
                'password' => filter_var($request->password, FILTER_SANITIZE_STRING),
            ];
            if(Auth::guard('employee')->attempt($cre_1) || Auth::guard('employee')->attempt($cre_2)){
                return back();
            }
        }catch(Exception $e){
            dd($e->getMessage());
            return back()->with('signin_error', 'Email or Password Wrong');
        }
        
    }
    function logout(){
        Auth::guard('employee')->logout();
        return redirect()->route('index');
    }
    function send_verification(){
        // send mail
        $user = Auth::guard('employee')->user();

        Mail::to($user->email)->send(new VerifyUser($user->verify_code));
        return back()->with('verify','ok');
        // message turn
    }
    function verify($code){
        $employee = Employee::where('verify_code', $code)->first();

        if($employee->verify_code == $code){
            $employee->is_verify = '1';
            $employee->save();
        }

        return redirect()->route('profile')->with('verified','Your account has been verified');
    }
    //Google Login

}

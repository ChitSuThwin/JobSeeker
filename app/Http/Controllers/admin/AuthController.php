<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    function register(Request $request){

        $v = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|unique:users',
            'password' => 'required|string',
        ],[
            'name.required' => 'Name cannot be empty',
            'name.string' => 'Name must be string',
            'name.regex' => 'Name cannot be have numeric'
        ]);

        if($v->fails()){
            return back()->withErrors($v->errors())->withInput($request->all());
        }
        $name = filter_var($request->name, FILTER_SANITIZE_STRING);
        $email = filter_var($request->email, FILTER_SANITIZE_EMAIL);
        $password = filter_var($request->password, FILTER_SANITIZE_STRING);
        if(User::create([
            'name' => $name,
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'email' => $email
        ])){
            $credentials = ['email' => $email, 'password' => $password];
            if(Auth::guard('web')->attempt($credentials)){
                return redirect()->route('admin.index');
            }
        }
        return back()->with('msg', ['type' => 'success', 'text' => 'User Created Successfully']);
    }
    function login(Request $request){

        $v = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if($v->fails()){
            return back()->with('error', 'Email or Password Wrong');
        }
        $email = filter_var($request->email, FILTER_SANITIZE_EMAIL);
        $password = filter_var($request->password, FILTER_SANITIZE_STRING);
        
        $credentials = ['email' => $email, 'password' => $password];
        if(Auth::guard('web')->attempt($credentials)){
            return redirect()->route('admin.index');
        }else{
            return back()->with('error', 'Email or Password Wrong');
        }
        
    }
    function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('admin.login');
    }
}

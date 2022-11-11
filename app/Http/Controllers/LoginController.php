<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
class LoginController extends Controller
{
    //
    protected function _registerOrLoginUser($data){
        $user =Employee::where('email',$data->email)->first();
          if(!$user){
             $user = new Employee();
             $user->name = $data->name;
             $user->email = $data->email;
             $user->avatar = $data->avatar;
             $user->verify_code = Str::random(20);
             $user->save();
          }
        Auth::login($user);
        }
        public function redirectToGoogle(){
            return Socialite::driver('google')->redirect();
            }
            
            //Google callback  
            public function handleGoogleCallback(){
            
            $user = Socialite::driver('google')->stateless()->user();
            // dd($user);
              $this->_registerorLoginUser($user);
              return redirect()->route('profile');
            }
            public function redirectToFacebook(){
              return Socialite::driver('facebook')->redirect();
             
              }
              
              //Google callback  
              public function handleFacebookCallback(){
              
              $user = Socialite::driver('facebook')->stateless()->user();
             
              $this->_registerorLoginUser($user);
              return redirect()->route('profile');
              }
              
              public function redirectToGithub(){
                return Socialite::driver('github')->redirect();
                }
                
                //Google callback  
                public function handleGithubCallback(){
                
                $user = Socialite::driver('github')->stateless()->user();
             
                $this->_registerorLoginUser($user);
                return redirect()->route('profile');
                }
}

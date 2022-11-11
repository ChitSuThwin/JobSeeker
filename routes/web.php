<?php

use App\Events\SendNoti;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\IndexController;
use App\Http\Controllers\admin\JobsController;
use App\Http\Controllers\admin\NotificationsController;
use App\Http\Controllers\admin\SearchController;
use App\Http\Controllers\admin\Testcontroller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\user\AuthController as UserAuthController;
use App\Http\Controllers\user\IndexController as UserIndexController;
use App\Http\Controllers\user\ProfileController;
use App\Http\Controllers\user\SearchController as UserSearchController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Public Routes

  Route::get('/', [UserIndexController::class,'index'])->name('index');
  Route::post('/signup', [UserAuthController::class, 'signup'])->name('signup');
  Route::post('/signin', [UserAuthController::class, 'signin'])->name('signin');
  Route::get('/search/{id}', [UserSearchController::class, 'searchByCategory'])->name('searchByCategory');
  Route::post('/search/key', [UserSearchController::class, 'searchByKeyword'])->name('searchByKeyword');
  Route::get('/about', [UserIndexController::class,'about'])->name('about');
  Route::get('/jobs', [UserIndexController::class,'jobs'])->name('jobs');
  Route::get('/login/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
  Route::get('/google/callback', [LoginController::class, 'handleGoogleCallback']);
  Route::get('/login/facebook', [LoginController::class, 'redirectToFacebook'])->name('login.facebook');
  Route::get('/callback', [LoginController::class, 'handleFacebookCallback']);
  Route::get('/login/github', [LoginController::class, 'redirectToGithub'])->name('login.github');
  Route::get('/github/callback', [LoginController::class, 'handleGithubCallback']);

  Route::group(['middleware'=>'isUserLogin'], function(){
    Route::get('/verify/{val}',[UserAuthController::class, 'verify'])->name('verify');
    Route::get('/send_verification', [UserAuthController::class, 'send_verification'])->name('send_verification');
    Route::get('/profile',[ProfileController::class, 'index'])->name('profile');
    Route::put('/profile/{id}/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/{id}/resume_upload', [ProfileController::class, 'resume'])->name('resume_upload');
    Route::get('/logout', [UserAuthController::class, 'logout'])->name('logout');
    Route::get('/job_details/{id}', [UserIndexController::class, 'details'])->name('jobDetails');
  });
 


// Admin Routes
Route::group(['prefix' => 'admin', 'middleware' => ['admin', 'web']], function(){
   Route::get('/', [IndexController::class, 'index'])->name('admin.index');
   Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');
   Route::resource('/categories', CategoriesController::class, ['as' => 'admin']);
   Route::resource('/jobs', JobsController::class, ['as' => 'admin']);
   // Route::post('/getData', function(Request $request){
   //    return response($request->id);
   // });
   Route::get('/noti/{id}', [NotificationsController::class, 'read'])->name('admin.noti.read');
   Route::get('/noti_getLatest', [NotificationsController::class, 'getLatest'])->name('admin.noti.getLatest');
   Route::get('/noti_getCount', [NotificationsController::class, 'getCount'])->name('admin.noti.getCount');
   Route::post('/categories/search',[SearchController::class, 'searchCategories'])->name('admin.searchCategories');
   Route::get('/test', [Testcontroller::class, 'index']);
   Route::get('/test/session', [Testcontroller::class, 'session']);
});


// Admin Auth Routes
Route::view('/admin/login', 'admin.auth.login')->middleware('inLogin');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login')->middleware('inLogin');

Route::get('/send/{msg}',function($message)
{
  broadcast(new SendNoti($message)); // for event
});

Route::view('/getMessage','pusher_testing');
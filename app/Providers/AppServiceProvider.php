<?php

namespace App\Providers;

use App\Models\Notifications;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Pagination\Paginator as PaginationPaginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
       PaginationPaginator::useBootstrap();
        if(Schema::hasTable('notifications')){
            $noti = Notifications::with('employee', 'jobs')->orderBy('created_at','DESC')->get();
            $recent_noti = Notifications::with('employee', 'jobs')->where('is_read','0')->orderBy('created_at','DESC')->take(7)->get();
            $notis = Notifications::where('is_read', '0')->get();
        $notiCount = $notis->count();
        View::share('recent_notifications', $recent_noti);
            View::share('notifications', $noti);
            View::share('notiCount',$notiCount);
            
        }
       
    }
}

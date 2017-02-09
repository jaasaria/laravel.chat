<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\tblNoti;
use Auth;
use Carbon\Carbon;

class DashboardServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        
        // View::share('site_settings', $site_settings);    notes:use this for single 

        view()->composer('back.pages.dashboard',function($view){

            $count_noti = Auth::user()->noti->count();
            $count_unread = Auth::user()->unreadNotifications->count();

            $lastMessage = Auth::user()->noti()
                        ->orderBy('id', 'desc')->first()->created_at;

            $last_noti = $lastMessage->diffForHumans();

            $view->with(['count_noti'=>$count_noti,'count_unread'=>$count_unread,'last_noti'=>$last_noti]);

        });




    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

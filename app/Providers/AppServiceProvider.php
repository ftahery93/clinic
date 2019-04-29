<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use Cookie;
use Crypt;
use Config;

class AppServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request) {

        // if you need to access in controller and views:
        // Using view composer to set following variables globally
        view()->composer('*', function($view)  {
            //check Guard
          if (Auth::guard('web')->check()) {
                $userInfo = Auth::user();
                $view->with('userInfo', $userInfo);
                $view->with('profile_size', 'Image size should be Width 200px x Height 200px');
                $view->with('profile_WH', 'max-width:200px;max-height:200px');
                $view->with('trainer_profile_size', 'Image size should be Width 770px x Height 300px');
                $view->with('trainer_profile_WH', 'max-width:500px;max-height:340px');
                $view->with('profile_size', 'Image size should be Width 100 x Height 100');
                $view->with('profile_WH', 'max-width:100px;max-height:100px');
                $view->with('module_icon_size', 'Image size should be Width 50 x Height 50');
                $view->with('module_icon_WH', 'max-width:50px;max-height:50px');
                $view->with('sponsoredAd_image_size', 'Image size should be Width 800 x Height 800');
                $view->with('sponsoredAd_image_WH', 'max-width:800px;max-height:800px');                                
                $view->with('android_users_count', \DB::table('push_registration')->where('mobile_type', '=', 'a')->count());
                $view->with('ios_users_count', \DB::table('push_registration')->where('mobile_type', '=', 'i')->count());
                $view->with('total_device_users', \DB::table('push_registration')->where('mobile_type', '=', 'i')->count());
                //$view->with('serviceNotification', \App\Models\Admin\RegisteredUser::select('company_name','id')->where(array('service_viewed'=>0,'user_type'=>1))->get());
               // $view->with('requirementNotification', \App\Models\Admin\RegisteredUser::select('company_name','id')->where(array('requirement_viewed'=>0,'user_type'=>1))->where('requirements','!=','')->get());
                //$view->with('serviceNotificationCount', \App\Models\Admin\RegisteredUser::select('company_name','id')->where(array('service_viewed'=>0,'user_type'=>1))->count());
               // $view->with('requirementNotificationCount', \App\Models\Admin\RegisteredUser::select('company_name','id')->where(array('requirement_viewed'=>0,'user_type'=>1))->where('requirements','!=','')->count());
            }
           
            $view->with('appTitle', \App\Models\Admin\Setting::getTitle());
            Config::set('global.appTitle', \App\Models\Admin\Setting::getTitle());
            Config::set('global.AuthExpiryDate',Carbon::now()->addHours(24));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

}

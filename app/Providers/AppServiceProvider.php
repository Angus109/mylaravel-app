<?php

namespace App\Providers;



use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

use App\SiteSetting;
use App\GeneralDetail;
use App\Country;
use App\FairFocus;
use App\Feedback;
use App\NoticeBoard;
use App\Calendar;
use App\Influencer;
use App\JoinInfluencer;
use App\LGA;
use App\State;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;

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
        Schema::defaultStringLength(191);

        View::composer('*', function ($view) {

            $view->with('site', SiteSetting::first());
            $view->with('calendar', Calendar::first());


            $view->with('states', State::all());
            $view->with('influencersall ', Influencer::all());
            $view->with('countries', Country::all());
            $view->with('lga', \App\LGA::all());
            $view->with('states', \App\State::all());


            $view->with('notices', NoticeBoard::orderBy('id', 'desc')->get());
            $view->with('general', \App\GeneralDetail::first());
            $view->with('task',\App\DailyTask::where('status', 0)->count());

        });

                if(App::environment() == "production")
        {
            $url = \Request::url();
            $check = strstr($url,"http://");
            if($check)
            {
                $newUrl = str_replace("http","https",$url);
                header("Location:".$newUrl);

            }
        }
}
}

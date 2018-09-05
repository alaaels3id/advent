<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Schema;
use App\Post;
use App\Product;
use Request;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // this collection of code is about changing lang;
        app()->singleton('lang', function(){
            if(auth()->user()){
               return (empty(auth()->user()->lang)) ? 'ar' : auth()->user()->lang;
            }else{
                return (session()->has('lang')) ? session()->get('lang') : 'ar';
            }
        });

        app()->singleton('langs', function(){ return ['ar', 'en']; });

        //this is to fix migration error with email unique;
        Schema::defaultStringLength(191);
        
        // Root of the website
        view()->share('root', Request::root());

        // authentication user
        view()->composer('*', function ($view) {
            $view->with('auth', auth()->user());
        });

        view()->composer('site.inc.sidemenu', function ($view) {
            $view->with('archives', Post::archives());
        });

    }

    public function register()
    {
        //
    }
}

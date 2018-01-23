<?php

namespace App\Providers;

use App\Ad;
use App\Category;
use App\Article;
use App\Keyword;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Carbon;


class MyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(){

        $this->navbar();
        $this->getArticlesbyKeyword();




        View::composer('layouts.ad', function ($view) {
            $ads = Ad::all();
            $view->with(compact('ads'));

        });



        View::composer('layouts.offer-popup', function ($view) {
            if(!Session::has('start_time')) {
                Session::put('start_time', Carbon::now()->timestamp);
            }
            $passedTime = Carbon::now()->timestamp - Session::get('start_time');
            $offerTime = Config::get('constants.offer_subscription_time');
            $view->with(['deltaTime' => $offerTime - $passedTime]);
        });
    }

    public function navbar(){
        View::composer('layouts.navbar', function($view){
            $categories = Category::all();
            $latest_articles = Article::select(['title', 'id'])->latest()->limit(4)->get();
            $view->with(compact('categories', 'latest_articles'));
        } );
    }

    public function getArticlesbyKeyword(){
        View::composer('layouts.keyword', function($view){
            $article = Article::select(['title', 'id', 'description'])->get();
            $keywords = Keyword::all();
            $view->with(compact('article', 'keywords'));

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

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer(
            'layouts.test',
            'App\Http\MainComposer@composeAds'
        );

//        view()->composer(
//            'site',
//            'App\Http\ViewComposers\AdsComposer'
//        );

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

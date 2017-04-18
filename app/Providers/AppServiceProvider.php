<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Facebook\FacebookInterface; 
use App\Services\Facebook\FacebookImplementation; 

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(FacebookInterface::class, FacebookImplementation::class); 
    }
}

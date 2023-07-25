<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \Illuminate\Support\Facades\URL;
use resources\views\vendor\pagination;

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
        if (env('APP_ENV') === 'production' or env('APP_ENV') === 'test') {
            URL::forceScheme('https');
        }
        
    }
    


}

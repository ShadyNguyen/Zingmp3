<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class StringJsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
        function getStringJS($input){
            return "'".$input."'";
        }
        view()->share('processString', 'App\Providers\StringProcessingServiceProvider::processString');
    }
}

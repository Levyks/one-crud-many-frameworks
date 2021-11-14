<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Log;

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
        $this->app['validator']->extend('numericarray', function($attribute, $value, $parameters) {
            foreach($value as $v) if(!is_numeric($v)) {
                return false;
            } 
            return true;
        }, 'The :attribute must be an array of integers.');
    }
}

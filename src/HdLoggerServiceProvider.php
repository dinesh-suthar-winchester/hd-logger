<?php

namespace Winchester\HdLogger;

use Illuminate\Support\ServiceProvider;
use Winchester\HdLogger\Services\HdloggerService;

class HdLoggerServiceProvider extends ServiceProvider
{
    /**
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function register()
    {
        $this->app->make('Winchester\HdLogger\Http\Controllers\HdLoggerController');
        $this->loadViewsFrom(__DIR__.'/views', 'hdlogger');

        $this->app->bind('hdlogger', function () {

            return new HdloggerService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
//        $this->loadViewsFrom(__DIR__.'/views', 'hdlogger');
//        $this->publishes([
//            __DIR__.'/views' => base_path('resources/views/winchester/hdlogger'),
//        ],'views');

    }
}

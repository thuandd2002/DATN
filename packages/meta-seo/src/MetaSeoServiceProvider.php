<?php

namespace MetaSeo;

use Illuminate\Support\ServiceProvider;

class MetaSeoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'metaseo');

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (method_exists($this, 'loadRoutesFrom'))
        {
            $this->loadRoutesFrom(__DIR__.'/routes.php');
        }

//        $this->loadRoutesFrom(__DIR__.'/routes', 'routes');
//        include __DIR__.'/routes.php';
//        $this->app->make('MetaSeoController');
    }
}

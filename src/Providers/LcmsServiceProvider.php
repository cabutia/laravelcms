<?php

namespace LaravelCMS\Providers;

use Illuminate\Support\ServiceProvider;

class LcmsServiceProvider extends ServiceProvider {

    public function boot ()
    {
        $this->loadRoutesFrom(__DIR__.'/../Routes/web.php');
        $this->loadMigrationsFrom(__DIR__.'/../Migrations');
        $this->loadTranslationsFrom(__DIR__.'/../Translations', 'cms');
        $this->loadViewsFrom(__DIR__.'/../Views', 'cms');
        $this->mergeConfigFrom(__DIR__.'/../../config/cms.php', 'cms');

        $this->publishes([
            __DIR__.'/../../assets/dist' => public_path('vendor/cms')
        ], 'public');
    }

    public function register ()
    {
    }

    public function provides ()
    {

    }
}

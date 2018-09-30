<?php

namespace LaravelCMS\Providers;

use Illuminate\Support\ServiceProvider;

class LcmsServiceProvider extends ServiceProvider {

    public function boot ()
    {
        // Register routes
        $this->loadRoutesFrom(__DIR__.'/../Routes/web.php');

        // Register migrations
        $this->loadMigrationsFrom(__DIR__.'/../Migrations');

        // Register translations
        $this->loadTranslationsFrom(__DIR__.'/../Translations', 'cms');

        // Register views
        $this->loadViewsFrom(__DIR__.'/../Views', 'cms');

        // Register configuration
        $this->mergeConfigFrom(__DIR__.'/../../config/cms.php', 'cms');

        // Publish assets (css,js)
        $this->publishes([
            __DIR__.'/../../assets/dist' => public_path('vendor/cms')
        ], 'public');

        // Register blade directives
        $this->registerBladeDirectives();
    }

    public function register ()
    {
    }

    public function provides ()
    {

    }

    private function registerBladeDirectives ()
    {

        \Blade::directive('alerts', function ($expression) {
            return "<?php
                    // Render errors
                    LaravelCMS\Helpers\MessageRenderer::errors(
                        \$errors->any() ? \$errors->all() : [],
                        isset(\$__cms_errors) ? \$__cms_errors : session('__cms_errors')
                    );

                    // Render messages
                    LaravelCMS\Helpers\MessageRenderer::messages(
                        isset(\$__cms_messages) ? \$__cms_messages : session('__cms_messages')
                    );

                    // Render successes
                    LaravelCMS\Helpers\MessageRenderer::successes(
                        isset(\$__cms_successes) ? \$__cms_successes : session('__cms_successes')
                    );

                    // Render warnings
                    LaravelCMS\Helpers\MessageRenderer::warnings(
                        isset(\$__cms_warnings) ? \$__cms_warnings : session('__cms_warnings')
                    ); ?>";
        });
    }
}

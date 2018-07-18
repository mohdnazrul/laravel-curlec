<?php

namespace MohdNazrul\CURLECLaravel;

use Illuminate\Support\ServiceProvider;

class CURLECServiceProvider extends ServiceProvider
{
    protected $defer = true;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/curlec.php' => config_path('curlec.php'),
        ], 'curlec');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/curlec.php', 'curlec');

        $this->app->singleton('CURLECApi', function ($app) {
            $config = $app->make('config');
            $serviceURL = $config->get('curlec.serviceUrl');
            return new CURLECApi($serviceURL);
        });
    }

    public function provides()
    {
        return ['CURLECApi'];
    }
}

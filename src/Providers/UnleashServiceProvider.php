<?php

namespace UnleashWrapper\Providers;

use Illuminate\Support\ServiceProvider;
use Unleash\Client\Unleash;
use Unleash\Client\UnleashBuilder;

class UnleashServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(Unleash::class, function () {
            return UnleashBuilder::create()
                ->withAppName(config('unleash.project_name'))
                ->withAppUrl(config('unleash.url'))
                ->withInstanceId(config('unleash.instance_id'))
                ->withHeader('Authorization', config('unleash.api_key'))
                ->build();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/unleash.php' => config_path('unleash.php'),
        ], 'config');
    }
}

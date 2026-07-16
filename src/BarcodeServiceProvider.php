<?php

namespace Yoosuf\Barcode;

use Illuminate\Support\ServiceProvider;

class BarcodeServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/barcode.php', 'barcode');

        $this->app->singleton(BarcodeManager::class, function ($app) {
            return new BarcodeManager($app['filesystem']);
        });

        $this->app->alias(BarcodeManager::class, 'barcode');
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/barcode.php' => config_path('barcode.php'),
        ], 'barcode-config');
    }
}

<?php

declare(strict_types=1);

namespace Bhavingajjar\LaravelPython;

use Bhavingajjar\LaravelPython\Commands\RunPython;
use Illuminate\Support\ServiceProvider;

class LaravelPythonServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('laravel-python.php'),
            ], 'config');

            // Registering package commands.
            $this->commands([
                RunPython::class,
            ]);
        }
    }

    /**
     * Register the application services.
     */
    public function register(): void
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'laravel-python');

        // Register the main class to use with the facade
        $this->app->singleton('laravel-python', static function () {
            return new LaravelPython();
        });
    }
}

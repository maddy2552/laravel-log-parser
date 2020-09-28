<?php

namespace Maddy2552\LaravelLogParser;

use Illuminate\Support\ServiceProvider;
use Maddy2552\LaravelLogParser\Console\Commands\ParseLogs;

class LaravelLogParserServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerPublishing();
        $this->registerExecutable();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/log-parser.php',
            'log-parser'
        );
    }

    /**
     * Register the package's executable Console.
     *
     * @return void
     */
    protected function registerExecutable(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ParseLogs::class,
            ]);
        }
    }

    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    protected function registerPublishing(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/log-parser.php' => $this->app->configPath('log-parser.php'),
            ]);
        }
    }
}

<?php

namespace Maddy2552\LaravelLogParser;

use Monolog\Formatter\JsonFormatter;
use Illuminate\Support\ServiceProvider;
use Monolog\Handler\RotatingFileHandler;
use Maddy2552\LaravelLogParser\Interfaces\Parser;
use Maddy2552\LaravelLogParser\Parsers\JsonParser;
use Maddy2552\LaravelLogParser\Factories\ParserFactory;
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

        $this->app->bind(LogParser::class, function ($app) {
            $provider = $this->detectProvider();
            return new LogParser($provider);
        });
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

    protected function detectProvider(): Parser
    {
        return ParserFactory::detectLogProvider($this->app);
    }
}

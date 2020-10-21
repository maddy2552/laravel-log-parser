<?php

namespace Maddy2552\LaravelLogParser\Factories;

use Monolog\Formatter\JsonFormatter;
use Monolog\Handler\RotatingFileHandler;
use Illuminate\Contracts\Container\Container;
use Maddy2552\LaravelLogParser\Interfaces\Parser;
use Maddy2552\LaravelLogParser\Interfaces\Factory;
use Maddy2552\LaravelLogParser\Parsers\JsonParser;

class ParserFactory implements Factory
{
    /**
     * @param  \Illuminate\Contracts\Container\Container  $app
     * @return \Maddy2552\LaravelLogParser\Interfaces\Parser
     */
    public static function detectLogProvider(Container $app): Parser
    {
        if ($app->has('log')) {
            $logHandlers = $app->get('log')->getHandlers();

            foreach ($logHandlers as $handler) {
                if ($handler instanceof RotatingFileHandler ||
                    $handler->formatter instanceof JsonFormatter
                ) {
                    return new JsonParser();
                }
            }
        }
    }
}

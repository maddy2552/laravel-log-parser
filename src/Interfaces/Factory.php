<?php

namespace Maddy2552\LaravelLogParser\Interfaces;

use Illuminate\Contracts\Container\Container;

interface Factory
{
    public static function detectLogProvider(Container $app): Parser;
}

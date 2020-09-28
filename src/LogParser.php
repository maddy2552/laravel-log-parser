<?php

namespace Maddy2552\LaravelLogParser;

use Maddy2552\LaravelLogParser\Interfaces\Parser;

class LogParser
{
    /**
     * Provider to parse logs.
     *
     * @var object $parser
     */
    protected object $parser;

    /**
     * Parser constructor.
     *
     * @param  \Maddy2552\LaravelLogParser\Interfaces\Parser  $parser
     */
    public function __construct(Parser $parser)
    {
        $this->parser = $parser;
    }
}

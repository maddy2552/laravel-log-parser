<?php

namespace Maddy2552\LaravelLogParser;

use Maddy2552\LaravelLogParser\Interfaces\Parser;

class LogParser
{
    /**
     * Provider to parse logs.
     *
     * @var Parser $parser
     */
    protected Parser $parser;

    /**
     * Parser constructor.
     *
     * @param  \Maddy2552\LaravelLogParser\Interfaces\Parser  $parser
     */
    public function __construct(Parser $parser)
    {
        $this->parser = $parser;
    }

    public function parse()
    {
        $this->parser->parseToArray();
    }
}

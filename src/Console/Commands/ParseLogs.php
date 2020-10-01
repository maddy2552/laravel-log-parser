<?php

namespace Maddy2552\LaravelLogParser\Console\Commands;

use Illuminate\Console\Command;
use Maddy2552\LaravelLogParser\LogParser;

class ParseLogs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'logs:parse';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse logs and send them to email';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @param  \Maddy2552\LaravelLogParser\LogParser  $parser
     * @return void
     */
    public function handle(LogParser $parser): void
    {
        // TODO: Parse logs
    }
}

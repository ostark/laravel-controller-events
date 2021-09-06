<?php

namespace ostark\LaravelControllerEvents\Commands;

use Illuminate\Console\Command;

class LaravelControllerEventsCommand extends Command
{
    public $signature = 'skeleton';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}

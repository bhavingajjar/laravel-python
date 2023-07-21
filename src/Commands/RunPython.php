<?php

declare(strict_types=1);

namespace Bhavingajjar\LaravelPython\Commands;

use Bhavingajjar\LaravelPython\LaravelPythonFacade;
use Illuminate\Console\Command;

class RunPython extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'python:run {script} {arguments?*}';

    /**
     * The console command description.
     */
    protected $description = 'Execute python script from console';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $scriptName = $this->argument('script');

        $arguments = $this->argument('arguments');

        $result = LaravelPythonFacade::run($scriptName, $arguments);

        $this->info($result);
    }
}

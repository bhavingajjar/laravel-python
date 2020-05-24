<?php

namespace Bhavingajjar\LaravelPython;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class LaravelPython
{
    public function __construct()
    {

    }

    public function run()
    {
        $pythonPath = 'python';
        if (PHP_OS === 'WINNT') {
            exec('where python', $pythonPath);
        } else {
            exec('which python', $pythonPath);
        }
        $process = Process::fromShellCommandline($pythonPath[0] . ' ' . public_path('script.py'));
        $process->run();

        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
        
        return $process->getOutput();
    }
}

<?php

namespace Bhavingajjar\LaravelPython;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class LaravelPython
{
    public $pythonPath = null;
    public $pythonResourcesPath = null;

    public function __construct()
    {
        self::setPaths();
    }

    private function setPaths()
    {
        $this->pythonPath = config('laravel-python.python_path');
        if (empty($pythonPath)) {
            if (PHP_OS === 'WINNT') {
                exec('where python', $this->pythonPath);
            } elseif (PHP_OS === 'Linux') {
                exec('which python', $this->pythonPath);
            } else {
                $this->pythonPath = 'python';
            }
        }
        if (is_array($this->pythonPath)) {
            $this->pythonPath = $this->pythonPath[0];
        }

        $this->pythonResourcesPath = config('laravel-python.python_resource_path');
    }

    public function run($scriptName)
    {
        if (! file_exists($this->pythonResourcesPath.'/'.$scriptName)) {
            return 'Python script not found';
        }
        $process = Process::fromShellCommandline($this->pythonPath.' '.$this->pythonResourcesPath.'/'.$scriptName);
        $process->run();
        $process->wait();
        // executes after the command finishes
        if (! $process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        return $process->getOutput();
    }
}

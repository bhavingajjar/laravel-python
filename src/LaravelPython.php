<?php

declare(strict_types=1);

namespace Bhavingajjar\LaravelPython;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class LaravelPython
{
    private string|array|null $pythonPath = null;
    private ?string $pythonResourcesPath = null;

    private ?string $mode = null;

    public function __construct()
    {
        self::setPaths();
    }

    public function getPythonPath(): array|string|null
    {
        return $this->pythonPath;
    }

    public function setPythonPath(array|string|null $pythonPath): void
    {
        $this->pythonPath = $pythonPath;
    }

    public function getPythonResourcesPath(): ?string
    {
        return $this->pythonResourcesPath;
    }

    public function setPythonResourcesPath(?string $pythonResourcesPath): void
    {
        $this->pythonResourcesPath = $pythonResourcesPath;
    }

    public function getMode(): ?string
    {
        return $this->mode;
    }

    public function setMode(?string $mode): void
    {
        $this->mode = $mode;
    }

    public function run(string $scriptName, array $params = []): mixed
    {
        if (self::checkPaths($scriptName)) {
            $cmd = $this->getPythonPath().' '.$this->getPythonResourcesPath().'/'.$scriptName;
            if (! empty($params)) {
                $cmd .= ' '.implode(' ', $params);
            }
            $process = Process::fromShellCommandline($cmd);
            $process->run();
            $process->wait();
            // executes after the command finishes
            if (! $process->isSuccessful()) {
                throw new ProcessFailedException($process);
            }

            return self::output(trim($process->getOutput()));
        }

        return false;
    }

    /**
     * @param  $output
     */
    private function output($output): mixed
    {
        return match ($this->getMode()) {
            'json' => json_decode($output, true),
            'collection' => collect($output),
            default => $output,
        };
    }

    private function checkPaths($scriptName): bool|string
    {
        if (empty($this->getPythonPath())) {
            return 'Python command not found';
        }
        if (! file_exists($this->getPythonResourcesPath().'/'.$scriptName)) {
            return 'Python script not found';
        }

        return true;
    }

    private function setPaths(): void
    {
        $this->setPythonResourcesPath(config('laravel-python.python_resource_path'));
        $this->setPythonPath(config('laravel-python.python_path'));
        if (empty($this->getPythonPath())) {
            self::setAutoPath();
        }
    }

    private function setAutoPath(): void
    {
        $autoPath = [];
        if (PHP_OS === 'WINNT') {
            exec('where python'.config('laravel-python.python_version'), $autoPath);
        } elseif (PHP_OS === 'Linux') {
            exec('which python'.config('laravel-python.python_version'), $autoPath);
        } else {
            $this->setPythonPath('python'.config('laravel-python.python_version'));
        }

        if (is_array($autoPath) && isset($autoPath[0])) {
            $this->setPythonPath($autoPath[0]);
        }
    }
}

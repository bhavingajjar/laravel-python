<?php

declare(strict_types=1);

namespace Bhavingajjar\LaravelPython;

use Illuminate\Support\Facades\Facade;

/**
 * @see \BhavinGajjar\LaravelPython\LaravelPythonFacade
 */
class LaravelPythonFacade extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return 'laravel-python';
    }
}

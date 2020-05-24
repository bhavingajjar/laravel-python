<?php

namespace Bhavingajjar\LaravelPython;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Bhavingajjar\LaravelPython\LaravelPythonFacade
 */
class LaravelPythonFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-python';
    }
}

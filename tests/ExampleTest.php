<?php

namespace Bhavingajjar\LaravelPython\Tests;

use Orchestra\Testbench\TestCase;
use Bhavingajjar\LaravelPython\LaravelPythonServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [LaravelPythonServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}

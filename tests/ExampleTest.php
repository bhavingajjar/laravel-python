<?php

namespace Bhavingajjar\LaravelPython\Tests;

use Bhavingajjar\LaravelPython\LaravelPythonServiceProvider;
use Orchestra\Testbench\TestCase;

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

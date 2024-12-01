<?php

namespace MoeMizrak\LaravelAopCore\Tests;

use MoeMizrak\LaravelAopCore\Facades\LaravelAopCore;
use MoeMizrak\LaravelAopCore\LaravelAopCoreServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

class TestCase extends OrchestraTestCase
{
    /**
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @param $app
     * @return string[]
     */
    protected function getPackageProviders($app): array
    {
        return [
            LaravelAopCoreServiceProvider::class,
        ];
    }

    /**
     * @param $app
     * @return string[]
     */
    protected function getPackageAliases($app): array
    {
        return [
            'LaravelAopCore' => LaravelAopCore::class,
        ];
    }
}
<?php

namespace MoeMizrak\LaravelAopCore\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelAopCore extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'laravel-aop-core';
    }
}
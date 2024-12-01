<?php

namespace MoeMizrak\LaravelAopCore;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class LaravelAopCoreServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerPublishing();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->configure();

        $this->app->bind('laravel-aop-core', function () {
            return new LaravelAopCore();
        });

        $this->app->bind(LaravelAopCore::class, function () {
            return $this->app->make('laravel-aop-core');
        });

        // Register the facade alias.
        AliasLoader::getInstance()->alias('LaravelAopCore', LaravelAopCore::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return ['laravel-aop-core'];
    }

    /**
     * Setup the configuration.
     *
     * @return void
     */
    protected function configure(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/laravel-aop-core.php', 'laravel-aop-core'
        );
    }

    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    protected function registerPublishing(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/laravel-aop-core.php' => config_path('laravel-aop-core.php'),
            ], 'laravel-aop-core');
        }
    }
}
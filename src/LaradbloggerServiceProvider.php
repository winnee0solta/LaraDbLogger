<?php

namespace winnee0solta\Laradblogger;

use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Exceptions\Handler;

class LaradbloggerServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->registerConfigs();
        $this->registerMigrations();
        // $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }

    public function register()
    {
        $this->app->singleton(ExceptionHandler::class, LaradbloggerErrorHandler::class);
    }


    protected function registerConfigs()
    {
        $this->publishes([
            __DIR__ . '/config/laradblogger.php' => config_path('laradblogger.php'),
        ], 'laradblogger-config');
    }

    protected function registerMigrations()
    {
        $this->publishes([
            __DIR__ . '/../database/migrations' => database_path('/migrations'),
        ], 'laradblogger-migrations');
    }
}
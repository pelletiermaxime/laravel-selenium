<?php

namespace Pelletiermaxime\LaravelSelenium;

use Illuminate\Support\ServiceProvider;

class LaravelSeleniumServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands(
            Commands\SeleniumDownloadCommand::class
        );
    }
}

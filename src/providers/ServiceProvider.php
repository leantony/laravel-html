<?php

namespace Leantony\Html\Providers;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../views', 'leantony');

        $this->publishes([
            __DIR__ . '/../views' => base_path('resources/views/vendor/leantony/html')
        ], 'views');

        $this->loadHelpers();
    }

    /**
     * Load helper files
     *
     * @return void
     */
    protected function loadHelpers()
    {
        $files = glob(__DIR__ . '/../helpers/*.php');
        foreach ($files as $file) {
            require_once($file);
        }
    }
}
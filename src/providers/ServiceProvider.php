<?php

namespace Leantony\Flash\Providers;

use Laracasts\Flash\FlashServiceProvider;

class ServiceProvider extends FlashServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        $this->publishes([
            __DIR__ . '/../views' => base_path('resources/views/vendor/leantony/flash')
        ]);
    }
}
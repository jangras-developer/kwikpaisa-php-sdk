<?php

namespace Jangras\Kwikpaisa;

use Illuminate\Support\ServiceProvider;

class KwikPaisaServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('kwikpaisa', function ($app) {
            return new KwikPaisaService();
        });
    }

    public function boot()
    {
        // Add any package booting logic here if necessary
    }
}

<?php

namespace App\Providers;

use App\Helpers\CurrenciesInterface;
use App\Helpers\Currency\USD;
use Illuminate\Support\ServiceProvider;

class CurrenciesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */

    public function register()
    {
        $this->app->bind(CurrenciesInterface::class, USD::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

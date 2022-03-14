<?php

namespace App\Providers;

use App\Helpers\GetNewPriceInterface;
use App\Helpers\UploadPrice\CsvFormat;
use App\Helpers\UploadPrice\XmlFormat;
use Illuminate\Support\ServiceProvider;

class GetNewPriceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(GetNewPriceInterface::class,CsvFormat::class);
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

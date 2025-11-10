<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\ReportService;

class ReportServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('report',function(){
            return new ReportService();
        });
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

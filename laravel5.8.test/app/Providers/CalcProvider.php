<?php

namespace App\Providers;

use App\Library\Calc;
use App\Library\Interfaces\CalcInterface;
use Illuminate\Support\ServiceProvider;

class CalcProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CalcInterface::class, function ($app) {
            
              return new Calc;
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

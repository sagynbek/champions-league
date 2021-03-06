<?php

namespace App\Providers;

use App\Models\Play;
use App\Models\Week;
use App\Observers\PlayObserver;
use App\Observers\WeekObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Week::observe(WeekObserver::class);
        Play::observe(PlayObserver::class);
    }
}

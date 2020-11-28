<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Season\SeasonCreatedEvent' => [
            'App\Listeners\Week\CreateWeeksListener',
            'App\Listeners\Prediction\MakeInitialPredictionListener',
        ],
        'App\Events\Week\WeekCreatedEvent' => [
            'App\Listeners\Play\CreatePlaysListener',
            'App\Listeners\WeeklyStanding\CreateWeeklyStandingsListener',
        ],
        'App\Events\Play\PlayUpdatedEvent' => [
            'App\Listeners\WeeklyStanding\UpdateWeeklyStandingListener',
            'App\Listeners\Prediction\UpdateGamePredictionListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

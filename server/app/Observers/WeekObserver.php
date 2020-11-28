<?php

namespace App\Observers;

use App\Events\Week\WeekCreatedEvent;
use App\Models\Week;

class WeekObserver
{
    /**
     * Handle the Week "created" event.
     *
     * @param  \App\Models\Week  $week
     * @return void
     */
    public function created(Week $week)
    {
        event(new WeekCreatedEvent($week));
    }

    /**
     * Handle the Week "updated" event.
     *
     * @param  \App\Models\Week  $week
     * @return void
     */
    public function updated(Week $week)
    {
        //
    }

    /**
     * Handle the Week "deleted" event.
     *
     * @param  \App\Models\Week  $week
     * @return void
     */
    public function deleted(Week $week)
    {
        //
    }

    /**
     * Handle the Week "restored" event.
     *
     * @param  \App\Models\Week  $week
     * @return void
     */
    public function restored(Week $week)
    {
        //
    }

    /**
     * Handle the Week "force deleted" event.
     *
     * @param  \App\Models\Week  $week
     * @return void
     */
    public function forceDeleted(Week $week)
    {
        //
    }
}

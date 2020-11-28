<?php

namespace App\Observers;

use App\Events\Play\PlayUpdatedEvent;
use App\Models\Play;

class PlayObserver
{
    /**
     * Handle the Play "created" event.
     *
     * @param  \App\Models\Play  $play
     * @return void
     */
    public function created(Play $play)
    {
        //
    }

    /**
     * Handle the Play "updated" event.
     *
     * @param  \App\Models\Play  $play
     * @return void
     */
    public function updated(Play $play)
    {
        event(new PlayUpdatedEvent($play));
    }

    /**
     * Handle the Play "deleted" event.
     *
     * @param  \App\Models\Play  $play
     * @return void
     */
    public function deleted(Play $play)
    {
        //
    }

    /**
     * Handle the Play "restored" event.
     *
     * @param  \App\Models\Play  $play
     * @return void
     */
    public function restored(Play $play)
    {
        //
    }

    /**
     * Handle the Play "force deleted" event.
     *
     * @param  \App\Models\Play  $play
     * @return void
     */
    public function forceDeleted(Play $play)
    {
        //
    }
}

<?php

namespace App\Listeners;

use App\Models\Distance;
use App\Events\SeasonCreated as Event;

class SetupSeason
{
    /**
     * @param Event $event
     */
    public function handle(Event $event)
    {
        $event->season->distances()->attach(Distance::all()->pluck('id'));
    }
}

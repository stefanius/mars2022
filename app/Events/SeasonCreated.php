<?php

namespace App\Events;

use App\Models\Season;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class SeasonCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var \App\Models\Season
     */
    public $season;

    /**
     * Create a new event instance.
     *
     * @param \App\Models\Season $season
     */
    public function __construct(Season $season)
    {
        $this->season = $season;
    }
}

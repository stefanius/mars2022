<?php

namespace App\Http\Livewire\Statistics;

use App\Models\Day;
use App\Models\Order;

class CountPaidOrdersSunday extends Statistics
{
    protected function title()
    {
        return __('Paid orders sunday');
    }

    protected function query($distanceId)
    {
        return Order::activeSeason()
            ->paid()
            ->where('distance_id', '=', $distanceId)
            ->where('day_id', '=', Day::SUNDAY)
            ->with('orderLines')
            ->count();
    }
}

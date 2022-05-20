<?php

namespace App\Http\Livewire\Statistics;

use App\Models\Day;
use App\Models\Order;
use Livewire\Component;
use App\Models\Distance;

class CountPaidOrdersSaturday extends Statistics
{
    protected function title()
    {
        return __('Paid orders saturday');
    }

    protected function query($distanceId)
    {
        return Order::activeSeason()
            ->paid()
            ->where('distance_id', '=', $distanceId)
            ->where('day_id', '=', Day::SATURDAY)
            ->with('orderLines')
            ->count();
    }
}

<?php

namespace App\Http\Livewire\Statistics;

use App\Models\Order;

class CountPaidOrdersDutch extends Statistics
{
    protected function title()
    {
        return __('Paid Dutch orders');
    }

    protected function query($distanceId)
    {
        return Order::activeSeason()
            ->paid()
            ->where('distance_id', '=', $distanceId)
            ->where('locale', '=', 'nl')
            ->with('orderLines')
            ->count();
    }
}

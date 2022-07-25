<?php

namespace App\Http\Livewire\Statistics;

use App\Models\Order;

class CountPaidOrdersEnglish extends Statistics
{
    protected function title()
    {
        return __('Paid English orders');
    }

    protected function query($distanceId)
    {
        return Order::activeSeason()
            ->paid()
            ->where('distance_id', '=', $distanceId)
            ->where('locale', '=', 'en')
            ->with('orderLines')
            ->count();
    }
}

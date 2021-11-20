<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Order;
use Livewire\Component;
use App\Models\Distance;

class VisitersOnTrack extends Component
{
    protected function get5KilometersStatistics()
    {
        return Order::activeSeason()->started()->where('distance_id', '=', Distance::DISTANCE_5_KM)->count();
    }

    protected function get10KilometersStatistics()
    {
        return Order::activeSeason()->started()->where('distance_id', '=', Distance::DISTANCE_10_KM)->count();
    }

    protected function get15KilometersStatistics()
    {
        return Order::activeSeason()->started()->where('distance_id', '=', Distance::DISTANCE_15_KM)->count();
    }

    protected function get25KilometersStatistics()
    {
        return Order::activeSeason()->started()->where('distance_id', '=', Distance::DISTANCE_25_KM)->count();
    }

    protected function get40KilometersStatistics()
    {
        return Order::activeSeason()->started()->where('distance_id', '=', Distance::DISTANCE_25_KM)->count();
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.dashboard.visiters-on-track', [
            'on_5_km' => $this->get5KilometersStatistics(),
            'on_10_km' => $this->get10KilometersStatistics(),
            'on_15_km' => $this->get15KilometersStatistics(),
            'on_25_km' => $this->get25KilometersStatistics(),
            'on_40_km' => $this->get40KilometersStatistics(),
        ]);
    }
}

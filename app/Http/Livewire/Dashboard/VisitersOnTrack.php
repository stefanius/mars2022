<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Order;
use Livewire\Component;
use App\Models\Distance;
use Illuminate\Database\Eloquent\Builder;

class VisitersOnTrack extends Component
{
    protected function counter($distanceId)
    {
        return Order::activeSeason()
            ->started()
            ->where('distance_id', '=', $distanceId)
            ->with('orderLines')
            ->get()
            ->sum(function (Order $order) {
                return $order->numberOfAttendees();
            });
    }

    protected function get5KilometersStatistics()
    {
        return $this->counter(Distance::DISTANCE_5_KM);
    }

    protected function get10KilometersStatistics()
    {
        return $this->counter(Distance::DISTANCE_10_KM);
    }

    protected function get15KilometersStatistics()
    {
        return $this->counter(Distance::DISTANCE_15_KM);
    }

    protected function get25KilometersStatistics()
    {
        return $this->counter(Distance::DISTANCE_25_KM);
    }

    protected function get40KilometersStatistics()
    {
        return $this->counter(Distance::DISTANCE_40_KM);
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

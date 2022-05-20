<?php

namespace App\Http\Livewire\Statistics;

use App\Models\Order;
use Livewire\Component;
use App\Models\Distance;

abstract class Statistics extends Component
{
    abstract protected function title();
    abstract protected function query($distanceId);

    protected function get5KilometersStatistics()
    {
        return $this->query(Distance::DISTANCE_5_KM);
    }

    protected function get10KilometersStatistics()
    {
        return $this->query(Distance::DISTANCE_10_KM);
    }

    protected function get15KilometersStatistics()
    {
        return $this->query(Distance::DISTANCE_15_KM);
    }

    protected function get25KilometersStatistics()
    {
        return $this->query(Distance::DISTANCE_25_KM);
    }

    protected function get40KilometersStatistics()
    {
        return $this->query(Distance::DISTANCE_40_KM);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.statistics.per-distance', [
            'title' => $this->title(),
            'on_5_km' => $this->get5KilometersStatistics(),
            'on_10_km' => $this->get10KilometersStatistics(),
            'on_15_km' => $this->get15KilometersStatistics(),
            'on_25_km' => $this->get25KilometersStatistics(),
            'on_40_km' => $this->get40KilometersStatistics(),
        ]);
    }
}

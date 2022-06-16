<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Order;
use App\Models\Season;
use Livewire\Component;

class VisitersOnTrack extends Component
{
    protected function counter($distanceId)
    {
        return Order::activeSeason()
            ->startedToday()
            ->where('distance_id', '=', $distanceId)
            ->with('orderLines')
            ->get()
            ->sum(function (Order $order) {
                return $order->numberOfAttendees();
            });
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        $distances = collect();

        Season::activeSeason()->distances->each(function ($distance) use ($distances) {
            $distances->put($distance->name, $this->counter($distance->id));
        });

        return view('livewire.dashboard.visiters-on-track', ['statistics' =>  $distances->toArray()]);
    }
}

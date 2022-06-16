<?php

namespace App\Http\Livewire\Statistics;

use App\Models\Season;
use Livewire\Component;

abstract class Statistics extends Component
{
    abstract protected function title();
    abstract protected function query($distanceId);

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        $distances = collect();

        Season::activeSeason()->distances->each(function ($distance) use ($distances) {
            $distances->put($distance->name, $this->query($distance->id));
        });

        return view('livewire.statistics.per-distance', ['title' => $this->title(), 'statistics' =>  $distances->toArray()]);
    }
}

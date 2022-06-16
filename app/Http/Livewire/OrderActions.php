<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Order;
use Livewire\Component;

class OrderActions extends Component
{
    /**
     * @var Order
     */
    public $order;

    /**
     * @return bool
     */
    public function paid()
    {
        return $this->order->markAsPaid();
    }

    /**
     * @return bool
     */
    public function start()
    {
        if ($this->order->isPaid()) {
            return $this->order->update(['started_at' => Carbon::now()]);
        }

        return $this->order->update([
            'paid_at' => Carbon::now(),
            'started_at' => Carbon::now(),
        ]);
    }

    /**
     * @return bool
     */
    public function finish()
    {
        return $this->order->update([
            'finished_at' => Carbon::now(),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.order-actions');
    }
}

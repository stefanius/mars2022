<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class OrderSearcher extends Component
{
    public $order;

    public $orderNumber;

    /**
     * Listen to updated event.
     *
     * @param string $propertyName
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function find()
    {
        $this->order = Order::where('order_number', 'like', $this->orderNumber)->first();

        if ($this->order) {
            return redirect(route('orders.show', $this->order));
        }
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('backoffice.components.order-searcher');
    }
}

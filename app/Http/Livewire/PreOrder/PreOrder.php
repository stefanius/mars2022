<?php

namespace App\Http\Livewire\PreOrder;

use App\Models\Day;
use App\Models\Distance;
use App\Models\OrderLine;
use App\Models\Season;
use App\Models\TicketType;
use App\Http\Livewire\FormWizard;
use Mollie\Laravel\Facades\Mollie;

class PreOrder extends FormWizard
{
    public $firstName;
    public $lastName;
    public $email;
    public $organization;
    public $distance;
    public $ticketType = [];
    public $ticketCount = [];
    public $phone;
    public $maxStep = 3;
    public $day;

    protected $rules = [
        1 => [
            'firstName' => 'required|min:1',
            'lastName' => 'required|min:1',
            'email' => 'required|email',
            'organization' => 'sometimes|nullable',
            'phone' => 'sometimes|nullable',
        ],
        2 => [
            'distance' => 'required',
            'ticketType' => 'required|array|min:1',
            'ticketCount' => 'required|array|min:1',
            'ticketType.*' => 'required',
            'ticketCount.*' => 'required',
        ],
    ];

    public function submit()
    {
        $this->order = \App\Models\Order::create([
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'email' => $this->email,
            'organization' => $this->organization,
            'phone' => $this->phone,
            'distance_id' => $this->distance,
            'day_id' => $this->day,
            'season_id' => Season::activeSeason()->id,
        ]);

        $this->getTicketsProperty()->each(function ($ticket) {
            OrderLine::create([
                'order_id' => $this->order->id,
                'ticket_type_id' => $ticket['ticket']->id,
                'half_price' => false,
                'quantity' => $ticket['quantity'],
                'amount' => $ticket['ticket']->amount_pre_order,
                'total_amount' => $ticket['total'],
            ]);
        });

        $this->preparePayment();
    }

    public function preparePayment()
    {
        $payment = Mollie::api()->payments->create([
            "amount" => [
                "currency" => "EUR",
                "value" => $this->order->grandTotal, // You must send the correct number of decimals, thus we enforce the use of strings
            ],
            "description" => "Duinenmars Order #" . $this->order->order_number,
            "redirectUrl" => route('order.success'),
            "webhookUrl" => route('webhooks.mollie'),
            "metadata" => [
                "order_id" => $this->order->order_number,
            ],
        ]);

        // redirect customer to Mollie checkout page
//        return redirect($payment->getCheckoutUrl(), 303);
        return redirect()->away($payment->getCheckoutUrl(), 303);
    }

    public function getSelectedDistanceProperty()
    {
        return Distance::find($this->distance);
    }

    public function getGrandTotalProperty()
    {
        return $this->getTicketsProperty()->sum(function ($item) {
            return $item['total'];
        });
    }

    public function getGrandTotalDecimalProperty()
    {
        return (double) $this->getGrandTotalProperty() / 100;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getTicketsProperty()
    {
        $tickets = collect();

        foreach ($this->ticketType as $key => $value) {
            $ticketType = TicketType::find($value);
            $quantity = $this->ticketCount[$key];

            $tickets->put($key, [
                'ticket' => $ticketType,
                'quantity' => $quantity,
                'total' => $quantity * $ticketType->amount_pre_order,
                'total_decimal' => (double) ($quantity * $ticketType->amount_pre_order) / 100,
            ]);
        }

        return $tickets;
    }

    public function ticketTypes()
    {
        return TicketType::all();
    }

    public function distances()
    {
        return Distance::all();
    }

    public function days()
    {
        return Day::all();
    }

    public function render()
    {
        return view('livewire.wizards.pre-order.pre-order-wizard', [
            'ticketTypes' => $this->ticketTypes(),
            'distances' => $this->distances(),
            'days' => $this->days(),
        ]);
    }
}

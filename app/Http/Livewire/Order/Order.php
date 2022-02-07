<?php

namespace App\Http\Livewire\Order;

use App\Models\Season;
use App\Models\Distance;
use App\Models\OrderLine;
use App\Models\TicketType;
use Illuminate\Support\Arr;
use App\Http\Livewire\FormWizard;

class Order extends FormWizard
{
    public $firstName;
    public $lastName;
    public $email;
    public $organization;
    public $distance;
    public $ticketType = [];
    public $ticketCount = [];
    public $halfPrice = [];
    public $phone;
    public $order;
    public $maxStep = 4;

    /**
     * Validation rules.
     *
     * @return array
     */
    protected function rules(): array
    {
        return [
            1 => [
                'firstName' => 'nullable',
                'lastName' => 'nullable',
                'email' => 'nullable',
                'organization' => 'nullable',
                'phone' => 'nullable',
            ],
            2 => [
                'distance' => 'required',
                'ticketType' => 'required|array|min:1|size:' . count($this->ticketCount),
                'ticketCount' => 'required|array|min:1|size:' . count($this->ticketType),
                'ticketType.*' => 'required|integer|min:1',
                'ticketCount.*' => 'required|integer|min:1',
            ],
        ];
    }

    /**
     * Validation attributes.
     *
     * @return array
     */
    protected function attributes(): array
    {
        return [
            'ticketCount.*' => 'amount',
        ];
    }

    /**
     * Skip live validation for the given attributes.
     *
     * @return array
     */
    protected function skipLiveValidation(): array
    {
        return [
            'ticketType',
            'ticketCount',
            'ticketType.*',
            'ticketCount.*',
        ];
    }

    /**
     * Submit the form.
     */
    public function submit()
    {
        $this->order = \App\Models\Order::create([
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'email' => $this->email,
            'organization' => $this->organization,
            'phone' => $this->phone,
            'distance_id' => $this->distance,
            'season_id' => Season::activeSeason()->id,
        ]);

        $this->getTicketsProperty()->each(function ($ticket) {
            OrderLine::create([
                'order_id' => $this->order->id,
                'ticket_type_id' => $ticket['ticket']->id,
                'half_price' => Arr::get($ticket, 'half_price', false),
                'quantity' => $ticket['quantity'],
                'amount' => $ticket['ticket']->amount_order,
                'total_amount' => $ticket['total'],
            ]);
        });

        $this->next();
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
            $halfPrice = Arr::get($this->halfPrice, $key, false);

            $total = $quantity * $ticketType->amount_order;
            $amount = $ticketType->amount_order;

            if ($halfPrice) {
                $total = $total / 2;
                $amount = $amount / 2;
            }

            $tickets->put($key, [
                'ticket' => $ticketType,
                'quantity' => $quantity,
                'total' => $total,
                'amount' => $amount,
                'half_price' => $halfPrice,
                'total_decimal' => (double) $total / 100,
            ]);
        }

        return $tickets;
    }

    /**
     * Get all ticket types.
     *
     * @return TicketType[]|\Illuminate\Database\Eloquent\Collection
     */
    public function ticketTypes()
    {
        return TicketType::all();
    }

    /**
     * Get all distances.
     *
     * @return Distance[]|\Illuminate\Database\Eloquent\Collection
     */
    public function distances()
    {
        return Distance::all();
    }

    /**
     * Create a fresh wizard.
     */
    public function fresh()
    {
        $this->reset();

        $this->firstPage();
//        $this->firstName = null;
//        $this->lastName = null;
//        $this->email = null;
//        $this->organization = null;
//        $this->phone = null;
//        $this->distance = null;
//
//        $this->ticketCount = [];
//        $this->ticketType = [];
//        $this->halfPrice = [];
    }

    /**
     * Render the form wizard.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.wizards.order.order-wizard', [
            'ticketTypes' => $this->ticketTypes(),
            'distances' => $this->distances(),
        ]);
    }
}

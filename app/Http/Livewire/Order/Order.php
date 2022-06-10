<?php

namespace App\Http\Livewire\Order;

use App\Models\Season;
use App\Models\Distance;
use App\Models\TicketType;
use Illuminate\Support\Arr;
use App\Actions\CreateOrder;
use Illuminate\Validation\Rule;
use App\Http\Livewire\FormWizard;

class Order extends FormWizard
{
    public $firstName;
    public $lastName;
    public $email;
    public $organisation;
    public $distance;
    public $ticketType = [];
    public $ticketCount = [];
    public $phone;
    public $maxStep = 4;
    public $order;
    public $locale;
    public $mailConsent = false;
    public $termsOfService = false;
    public $halfPrice = [];

    /**
     * Validation rules.
     *
     * @return array
     */
    protected function rules(): array
    {
        return [
            1 => [
                'distance' => 'required',
                'ticketType' => 'required|array|min:1|size:' . max(count($this->ticketCount), 1),
                'ticketCount' => 'required|array|min:1|size:' . max(count($this->ticketType), 1),
                'halfPrice' => 'sometimes|nullable|array|size:' . count($this->ticketType),
                'ticketType.*' => 'required|integer|min:1',
                'ticketCount.*' => 'required|integer|min:1',
                'halfPrice.*' => 'sometimes|nullable|integer',
            ],
            2 => [
                'firstName' => 'required',
                'lastName' => 'required',
                'email' => 'sometimes|nullable|email:rfc,dns',
                'organisation' => 'sometimes|nullable',
                'phone' => 'sometimes|nullable',
                'termsOfService' => ['required', 'boolean', Rule::in(['1', 'true', true])],
                'mailConsent' => ['sometimes', 'nullable', 'boolean', Rule::in(['1', 'true', true])],
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
        $this->order = app(CreateOrder::class)->handle([
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'email' => $this->email,
            'organisation' => $this->organisation,
            'phone' => $this->phone,
            'distance_id' => $this->distance,
            'season_id' => Season::activeSeason()->id,
            'day_id' => now()->dayOfWeekIso,
            'locale' => $this->locale,
            'mail_consent' => $this->mailConsent,
            'agreed_terms_of_service' => $this->termsOfService,
        ], $this->ticketType, $this->ticketCount, $this->halfPrice);

        $this->lastPage();
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

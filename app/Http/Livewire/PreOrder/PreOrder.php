<?php

namespace App\Http\Livewire\PreOrder;

use App\Models\Day;
use App\Models\Season;
use App\Models\Distance;
use App\Models\OrderLine;
use App\Models\TicketType;
use Illuminate\Validation\Rule;
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
    public $order;
    public $locale;
    public $mailConsent = false;
    public $termsOfService = false;

    public function mount()
    {
        $this->locale = request('locale', 'en');
    }

    /**
     * Validation rules.
     *
     * @return array
     */
    protected function rules(): array
    {
        return [
            1 => [
                'day' => 'required',
                'distance' => 'required',
                'ticketType' => 'required|array|min:1|size:' . max(count($this->ticketCount), 1),
                'ticketCount' => 'required|array|min:1|size:' . max(count($this->ticketType), 1),
                'ticketType.*' => 'required|integer|min:1',
                'ticketCount.*' => 'required|integer|min:1',
            ],
            2 => [
                'firstName' => 'required|min:1',
                'lastName' => 'required|min:1',
                'email' => 'required|email:rfc,dns',
                'organization' => 'sometimes|nullable',
                'phone' => 'sometimes|nullable',
                'termsOfService' => ['required', 'boolean', Rule::in(['1', 'true', true])],
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
     * @return array
     */
    protected function messages(): array
    {
        return [
            'termsOfService.in' => __('You must agree with our terms of service.'),
        ];
    }

    /**
     * Submit form wizard.
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
            'day_id' => $this->day,
            'season_id' => Season::activeSeason()->id,
            'locale' => $this->locale,
            'mail_consent' => $this->mailConsent,
            'agreed_terms_of_service' => $this->termsOfService,
        ]);

        $this->getTicketsProperty()
            ->mapToGroups(function ($ticket, $key) {
                return [$ticket['ticket']->id => $ticket];
            })
            ->each(function ($group) {
                $group = collect($group);

                OrderLine::create([
                    'order_id' => $this->order->id,
                    'ticket_type_id' => $group->first()['ticket']->id,
                    'half_price' => false,
                    'quantity' => $group->sum('quantity'),
                    'amount' => $group->first()['ticket']->amount_pre_order,
                    'total_amount' => $group->sum('total'),
                ]);
            });

        $this->preparePayment();
    }

    /**
     * Prepare Mollie payment.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function preparePayment()
    {
        $payment = Mollie::api()->payments->create([
            "amount" => [
                "currency" => "EUR",
                "value" => number_format($this->order->grandTotal, 2, '.', ''), // You must send the correct number of decimals, thus we enforce the use of strings
            ],
            "description" => "Duinenmars Order #" . $this->order->order_number,
            // "redirectUrl" => route('order.success'),
            "webhookUrl" => route('webhooks.mollie'),
            "metadata" => [
                "order_id" => $this->order->order_number,
            ],
        ]);

        // redirect customer to Mollie checkout page
        return redirect()->away($payment->getCheckoutUrl(), 303);
    }

    /**
     * Get the Distance object.
     *
     * @return Distance
     */
    public function getSelectedDistanceProperty()
    {
        return Distance::find($this->distance);
    }

    /**
     * Get the grand total of the order.
     *
     * @return mixed
     */
    public function getGrandTotalProperty()
    {
        return $this->getTicketsProperty()->sum(function ($item) {
            return $item['total'];
        });
    }

    /**
     * Get the grand total in decimals.
     *
     * @return float
     */
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

    /**
     * Get all tickettypes.
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
     * Get all days.
     *
     * @return Day[]|\Illuminate\Database\Eloquent\Collection
     */
    public function days()
    {
        return Day::where('show_on_pre_order', '=', true)->get();
    }

    /**
     * Render the wizard.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.wizards.pre-order.pre-order-wizard', [
            'ticketTypes' => $this->ticketTypes(),
            'distances' => $this->distances(),
            'days' => $this->days(),
        ]);
    }
}

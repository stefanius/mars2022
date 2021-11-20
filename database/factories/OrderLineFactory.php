<?php

namespace Database\Factories;

use App\Models\OrderLine;
use App\Models\TicketType;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderLineFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderLine::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $ticketType = TicketType::all()->random();
        $quantity = $this->faker->numberBetween(1, 5);

        $halfPrice = $this->faker->boolean($quantity);

        $total = $quantity * $ticketType->amount_order;
        $amount = $ticketType->amount_order;

        if ($halfPrice) {
            $total = $total / 2;
            $amount = $amount / 2;
        }

        return [
            'ticket_type_id' => $ticketType->id,
            'quantity' => $quantity,
            'amount' => $amount,
            'half_price' => $halfPrice,
            'total_amount' => $total,
        ];
    }
}

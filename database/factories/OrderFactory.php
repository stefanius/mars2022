<?php

namespace Database\Factories;

use App\Models\Day;
use App\Models\Order;
use App\Models\Distance;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $paid = $this->faker->boolean(50);
        $finished = $paid && $this->faker->boolean(50);
        $printed = $paid && $this->faker->boolean(50);

        return [
            'first_name' => $this->faker->boolean(55) ? $this->faker->firstName : null,
            'last_name' => $this->faker->boolean(55) ? $this->faker->lastName : null,
            'email' => $this->faker->boolean(50) ? $this->faker->email : null,
            'organization' => $this->faker->boolean(15) ? $this->faker->company : null,
            'phone' => $this->faker->boolean(15) ? $this->faker->phoneNumber : null,
            'distance_id' => Distance::all()->random()->id,
            'day_id' => Day::all()->random()->id,
            'paid_at' => $paid ? $this->faker->dateTime() : null,
            'started_at' => $paid? $this->faker->dateTime() : null,
            'finished_at' => $finished ? $this->faker->dateTime() : null,
            'printed_at' => $printed ? $this->faker->dateTime() : null,
        ];
    }
}

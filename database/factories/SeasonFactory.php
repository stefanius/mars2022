<?php

namespace Database\Factories;

use App\Models\Season;
use Illuminate\Database\Eloquent\Factories\Factory;

class SeasonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Season::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pre_order_starts_at' => $this->faker->date(),
            'pre_order_ends_at' => $this->faker->date(),
            'saturday_date' => $this->faker->date(),
            'sunday_date' => $this->faker->date(),
            'year' => $this->faker->year(),
            'edition' => $this->faker->randomNumber(2),
        ];
    }
}

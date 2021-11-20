<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\AddressType;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'street_address' => $this->faker->streetAddress,
            'postal_code' => $this->faker->numberBetween(1000, 9000) . ' ' . Str::upper(Str::random(2)),
            'city' => $this->faker->city,
            'send_poster' => $this->faker->boolean(),
            'send_email' => $this->faker->boolean(),
            'address_type_id' => AddressType::all()->random()->id,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}

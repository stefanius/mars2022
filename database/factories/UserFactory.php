<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

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
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'locale' => 'en',
        ];
    }

    /**
     * Create an administrator.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function admin()
    {
        return $this->state(function (array $attributes) {
            return [
                'admin' => true,
            ];
        });
    }

    /**
     * Create a suspended user.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function suspended()
    {
        return $this->state(function (array $attributes) {
            return [
                'suspended_at' => now(),
            ];
        });
    }

    /**
     * Create a user with an expired login window.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function expiredLoginWindow()
    {
        return $this->state(function (array $attributes) {
            return [
                'login_window_starts_at' => now()->subWeeks(5),
                'login_window_ends_at' => now()->subWeeks(3),
            ];
        });
    }

    /**
     * Create a user with an active login window.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function activeLoginWindow()
    {
        return $this->state(function (array $attributes) {
            return [
                'login_window_starts_at' => now()->subWeeks(5),
                'login_window_ends_at' => now()->addWeeks(5),
            ];
        });
    }

    /**
     * Create a user with an active login window.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function futureLoginWindow()
    {
        return $this->state(function (array $attributes) {
            return [
                'login_window_starts_at' => now()->addWeeks(5),
                'login_window_ends_at' => now()->addWeeks(10),
            ];
        });
    }
}

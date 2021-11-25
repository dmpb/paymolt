<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'payment_metadata'  => [
                'currency'  => $this->faker->currencyCode(),
                'amount'     => $this->faker->numberBetween(5, 60),
            ],
            'user_metadata'     => [
                'name'      => $this->faker->name(),
                'email'     => $this->faker->email(),
            ],
        ];
    }
}

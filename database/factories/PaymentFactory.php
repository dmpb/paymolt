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
            'mode_type'     => 'development',
            'description'   => $this->faker->text(50),
            'client'        => [
                'name'          => $this->faker->name(),
                'email'         => $this->faker->email(),
                'phone_number'  => $this->faker->phoneNumber(),
                'address'       => $this->faker->streetAddress(),
            ]
        ];
    }
}

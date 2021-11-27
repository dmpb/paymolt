<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentLinkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code'          => $this->faker->uuid(),
            'mode_type'     => 'development',
            'currency'      => 'PEN',
            'amount'        => $this->faker->randomFloat(2, 5, 100),
            'description'   => $this->faker->text(50),
            'finished_at'   => now()->addDays(3),
            'policy_settings'   => [
                'name_required'         => $this->faker->boolean,
                'email_required'        => $this->faker->boolean,
                'phone_number_required' => $this->faker->boolean,
                'address_required'      => $this->faker->boolean,
            ]
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
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
            'name'          => $this->faker->sentence(3),
            'description'   => $this->faker->sentence(),
            'currency'      => $this->faker->currencyCode(),
            'amount'        => $this->faker->numberBetween(10, 60),
            'finished_at'   => now()->addDays(3),
        ];
    }
}

<?php

namespace Database\Seeders;

use App\Models\Payment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(2)->has(
            Product::factory()->count(10)->has(
                Payment::factory()->count(5)->state(function (array $attributes, Product $product) {
                    return [
                        'payment_metadata' => [
                            'currency'  => $product->currency,
                            'amount'  => $product->amount,
                        ]
                    ];
                })
            )
        )->create();
    }
}

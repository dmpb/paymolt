<?php

namespace Database\Seeders;

use App\Models\Payment;
use App\Models\PaymentLink;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
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
        // Crear 5 usuarios con 10 payments links y 25 payments
        User::factory()->count(5)
            ->has(
                PaymentLink::factory()->count(10)->state(
                    new Sequence(
                        ['finished_at' => now()->addDays(3)],
                        ['finished_at' => now()],
                    )
                )
            )
            ->has(
                Payment::factory()->count(25)->state(
                    new Sequence(
                        [
                            'charge_culqi_id'   => 'chr_test_y5OO7p6GGrWnTPY6',
                            'status'            => 'venta_exitosa',
                            'currency'          => 'PEN',
                            'amount'            => 33.00,
                        ],
                        [
                            'charge_culqi_id' => 'chr_test_TBvHeN5bXJWvgbOd',
                            'status'            => 'card_error',
                            'currency'          => 'PEN',
                            'amount'            => 33.00,
                        ]
                    )
                )
            )
            ->create();
    }
}

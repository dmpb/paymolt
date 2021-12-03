<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\TryCatch;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crea el usuario por defecto';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            User::create([
                'name' => 'Daniel Ponce',
                'email' => 'dmpb@example.com',
                'password' => Hash::make('password'),
                'settings->culqi_development->public_key' => 'pk_test_2baa0c68aa9d5f63',
                'settings->culqi_development->private_key' => 'sk_test_b81df9935f43b041',
                'settings->culqi_production->public_key' => '',
                'settings->culqi_production->private_key' => '',
            ]);

            $this->info('Usuario creado exitosamente');
            $this->line('email: dmpb@example.com');
            $this->line('password: password');
        } catch (\Throwable $th) {
            $this->error('No se pudo crear el usuario.');
        }
    }
}

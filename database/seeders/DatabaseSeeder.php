<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Clientes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // User::factory(10)->create();
        Clientes::factory()->create([
            'nome' => 'Ronaldo',
            'cpf'=> '123456789',
            'telefone'=> '528585963',
            'reserva'=> 12,
        ]);



        // User::factory()->create([
        //     'name' => 'Usuário',
        //     'email' => 'teste@confeccao.com.br',
        // ]);
    }
}

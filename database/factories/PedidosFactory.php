<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pedidos>
 */
class PedidosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "id_pedido" => fake()->randomNumber(9, true), // Id do pedido 
            "quantidade"=> fake()->numberBetween(), // Quantidade
            'valor' => fake()->randomFloat(),
            'clientes_id' => fake()->randomDigit(),
            'fornecedor_id' => fake()->randomDigit(),
        ];
    }
}

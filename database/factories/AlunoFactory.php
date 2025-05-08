<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Classes; 

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Aluno>
 */
class AlunoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'classes_id' => Classes::factory(),
            'nome' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'telefone' => $this->faker->phoneNumber(),
            'matricula' => $this->faker->unique()->numerify('########'),
            'status' => $this->faker->randomElement(['ativo', 'inativo']),
        ];
    }
}

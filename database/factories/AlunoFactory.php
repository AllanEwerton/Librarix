<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Aluno>
 */
class AlunoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'telefone' => $this->faker->phoneNumber(),
            'matricula' => $this->faker->unique()->numberBetween(100000, 999999),
            'turma' => $this->faker->word(),
            'turno' => $this->faker->randomElement(['manhã', 'tarde', 'noite']),
            'status' => $this->faker->randomElement(['ativo', 'inativo']),
        ];
    }
}

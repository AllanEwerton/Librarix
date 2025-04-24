<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Emprestimo>
 */
class EmprestimoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'aluno_id' => \App\Models\Aluno::factory(),
            'data_emprestimo' => $this->faker->date(),
            'data_devolucao_prevista' => $this->faker->dateTimeBetween('now', '+7 days'),
            'data_devolucao_real' => null,
            'renovacao' => $this->faker->numberBetween(0, 3),
            'data_renovacao' => null,
            'status' => $this->faker->randomElement(['ativo', 'devolvido', 'atrasado']),

        ];
    }
}

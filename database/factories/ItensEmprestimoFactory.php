<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Emprestimo;
use App\Models\Livro;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ItensEmprestimo>
 */
class ItensEmprestimoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'emprestimo_id' => Emprestimo::factory(),
            'livro_id' => Livro::factory(),
        ];
    }
}

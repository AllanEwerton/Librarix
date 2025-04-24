<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Livro>
 */
class LivroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->sentence(),
            'autor_id' => \App\Models\Autor::factory(),
            'categoria_id' => \App\Models\Categoria::factory(),
            'ano_publicacao' => $this->faker->year(),
            'isbn' => $this->faker->unique()->isbn13(),
            'descricao' => $this->faker->paragraph(),
            'imagem' => $this->faker->imageUrl(640, 480, 'books'),
            'quantidade' => $this->faker->numberBetween(1, 100),
            'status' => $this->faker->randomElement(['disponível', 'indisponível', 'emprestado']),
        ];
    }
}

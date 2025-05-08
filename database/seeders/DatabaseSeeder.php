<?php

namespace Database\Seeders;


use App\Models\Autor;
use App\Models\Categoria;
use App\Models\Classes;
use App\Models\Aluno;
use App\Models\Livro;
use App\Models\Emprestimo;
use App\Models\ItensEmprestimo;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Cria 5 categorias
        $categorias = Categoria::factory()->count(5)->create();

        // Cria 10 autores
        $autores = Autor::factory()->count(10)->create();

        // Cria 15 livros associando a autores e categorias existentes
        Livro::factory()->count(15)->create([
            'autor_id' => function() {
                return Autor::inRandomOrder()->first()->id;
            },
            'categoria_id' => function() {
                return Categoria::inRandomOrder()->first()->id;
            }
        ]);

        // Cria 8 turmas (classes)
        $classes = Classes::factory()->count(8)->create();

        // Cria 50 alunos associados a turmas existentes
        Aluno::factory()->count(50)->create([
            'classes_id' => function() {
                return Classes::inRandomOrder()->first()->id;
            }
        ]);

        // Cria 30 empréstimos com itens (abordagem alternativa)
        Emprestimo::factory()->count(30)->create([
            'aluno_id' => function() {
                return Aluno::inRandomOrder()->first()->id;
            }
        ])->each(function ($emprestimo) {
            // Para cada empréstimo, cria 1-3 itens
            ItensEmprestimo::factory()
                ->count(rand(1, 3))
                ->create([
                    'emprestimo_id' => $emprestimo->id,
                    'livro_id' => function() {
                        return Livro::inRandomOrder()->first()->id;
                    }
                ]);
        });
    }
}

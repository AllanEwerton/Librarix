<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LivroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('livros')->insert([
            [
                'titulo' => 'O Senhor dos Anéis',
                'descricao' => 'Uma obra-prima de fantasia épica.',
                'autor_id' => \App\Models\Autor::factory()->create()->id,
                'categoria_id' => \App\Models\Categoria::factory()->create()->id,
                'ano_publicacao' => 1954,
                'isbn' => '978-0-261-10221-7',
                'quantidade' => 5,
                'status' => 'disponível',
                'imagem' => 'https://example.com/imagem1.jpg',

            ],
            [
                'titulo' => '1984',
                'descricao' => 'Um romance distópico sobre vigilância e controle.',
                'autor_id' => \App\Models\Autor::factory()->create()->id,
                'categoria_id' => \App\Models\Categoria::factory()->create()->id,
                'ano_publicacao' => 1949,
                'isbn' => '978-0-452-28423-4',
                'quantidade' => 3,
                'status' => 'disponível',
                'imagem' => 'https://example.com/imagem2.jpg',
            ],
            [
                'titulo' => 'Dom Casmurro',
                'descricao' => 'Um romance brasileiro clássico de Machado de Assis.',
                'autor_id' => \App\Models\Autor::factory()->create()->id,
                'categoria_id' => \App\Models\Categoria::factory()->create()->id,
                'ano_publicacao' => 1899,
                'isbn' => '978-85-359-0277-2',
                'quantidade' => 4,
                'status' => 'disponível',
                'imagem' => 'https://example.com/imagem3.jpg',
            ],
            [
                'titulo' => 'A Revolução dos Bichos',
                'descricao' => 'Uma fábula política sobre a Revolução Russa.',
                'autor_id' => \App\Models\Autor::factory()->create()->id,
                'categoria_id' => \App\Models\Categoria::factory()->create()->id,
                'ano_publicacao' => 1945,
                'isbn' => '978-0-452-28424-1',
                'quantidade' => 2,
                'status' => 'disponível',
                'imagem' => 'https://example.com/imagem4.jpg',
            ],
            [
                'titulo' => 'O Pequeno Príncipe',
                'descricao' => 'Uma história poética sobre amor e amizade.',
                'autor_id' => \App\Models\Autor::factory()->create()->id,
                'categoria_id' => \App\Models\Categoria::factory()->create()->id,
                'ano_publicacao' => 1943,
                'isbn' => '978-3-16-148410-0',
                'quantidade' => 6,
                'status' => 'disponível',
                'imagem' => 'https://example.com/imagem5.jpg',
            ],
            [
                'titulo' => 'Cem Anos de Solidão',
                'descricao' => 'Um épico da literatura latino-americana.',
                'autor_id' => \App\Models\Autor::factory()->create()->id,
                'categoria_id' => \App\Models\Categoria::factory()->create()->id,
                'ano_publicacao' => 1967,
                'isbn' => '978-0-06-088328-7',
                'quantidade' => 2,
                'status' => 'disponível',
                'imagem' => 'https://example.com/imagem6.jpg',
            ],
            [
                'titulo' => 'A Metamorfose',
                'descricao' => 'Uma história surreal sobre transformação.',
                'autor_id' => \App\Models\Autor::factory()->create()->id,
                'categoria_id' => \App\Models\Categoria::factory()->create()->id,
                'ano_publicacao' => 1915,
                'isbn' => '978-0-14-243737-4',
                'quantidade' => 3,
                'status' => 'disponível',
                'imagem' => 'https://example.com/imagem7.jpg',
            ],
            [
                'titulo' => 'O Morro dos Ventos Uivantes',
                'descricao' => 'Um romance gótico sobre amor e vingança.',
                'autor_id' => \App\Models\Autor::factory()->create()->id,
                'categoria_id' => \App\Models\Categoria::factory()->create()->id,
                'ano_publicacao' => 1847,
                'isbn' => '978-0-14-143955-6',
                'quantidade' => 1,
                'status' => 'disponível',
                'imagem' => 'https://example.com/imagem8.jpg',
            ],
            [
                'titulo' => 'Orgulho e Preconceito',
                'descricao' => 'Um romance sobre amor e classe social.',
                'autor_id' => \App\Models\Autor::factory()->create()->id,
                'categoria_id' => \App\Models\Categoria::factory()->create()->id,
                'ano_publicacao' => 1813,
                'isbn' => '978-0-19-953556-9',
                'quantidade' => 4,
                'status' => 'disponível',
                'imagem' => 'https://example.com/imagem9.jpg',
            ],
            [
                'titulo' => 'A Divina Comédia',
                'descricao' => 'Uma obra-prima da literatura medieval.',
                'autor_id' => \App\Models\Autor::factory()->create()->id,
                'categoria_id' => \App\Models\Categoria::factory()->create()->id,
                'ano_publicacao' => 1320,
                'isbn' => '978-0-14-243722-0',
                'quantidade' => 2,
                'status' => 'disponível',
                'imagem' => 'https://example.com/imagem10.jpg',
            ],
            [
                'titulo' => 'O Grande Gatsby',
                'descricao' => 'Um retrato da sociedade americana dos anos 1920.',
                'autor_id' => \App\Models\Autor::factory()->create()->id,
                'categoria_id' => \App\Models\Categoria::factory()->create()->id,
                'ano_publicacao' => 1925,
                'isbn' => '978-0-7432-7356-5',
                'quantidade' => 3,
                'status' => 'disponível',
                'imagem' => 'https://example.com/imagem11.jpg',
            ],
        ]);
    }
}

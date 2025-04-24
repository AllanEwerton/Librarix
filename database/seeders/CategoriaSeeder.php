<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert([
            [
                'nome' => 'Ficção',
            ],
            [
                'nome' => 'Não-ficção',
            ],
            [
                'nome' => 'Fantasia',
            ],
            [
                'nome' => 'Biografia',
            ],
            [
                'nome' => 'História',
            ],
            [
                'nome' => 'Ciência',
            ],
            [
                'nome' => 'Tecnologia',
            ],
            [
                'nome' => 'Arte',
            ],
            [
                'nome' => 'Música',
            ],
            [
                'nome' => 'Literatura',
            ],
            [
                'nome' => 'Poesia',
            ],
            [
                'nome' => 'Drama',
            ],
            [
                'nome' => 'Romance',
            ],
            [
                'nome' => 'Terror',
            ],
            [
                'nome' => 'Mistério',
            ],
            [
                'nome' => 'Aventura',
            ],
            [
                'nome' => 'Suspense',
            ],
            [
                'nome' => 'Comédia',
            ],
            [
                'nome' => 'Autoajuda',
            ],
            [
                'nome' => 'Religião',
            ],
            [
                'nome' => 'Espiritualidade',
            ],
            [
                'nome' => 'Saúde',
            ],
            [
                'nome' => 'Culinária',
            ],
            [
                'nome' => 'Viagem',
            ],
            [
                'nome' => 'Ficção Científica',
            ],
            [
                'nome' => 'História em Quadrinhos',
            ],
        ]);
    }
}

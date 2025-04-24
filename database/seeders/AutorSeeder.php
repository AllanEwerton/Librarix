<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AutorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('autores')->insert([
            [
                'nome' => 'Machado de Assis',

            ],
            [
                'nome' => 'J.K. Rowling',
            ],
            [
                'nome' => 'George Orwell',
            ],
            [
                'nome' => 'Agatha Christie',
            ],
            [
                'nome' => 'Ernest Hemingway',
            ],
            [
                'nome' => 'F. Scott Fitzgerald',
            ],
            [
                'nome' => 'Jane Austen',
            ],
            [
                'nome' => 'Mark Twain',
            ],
            [
                'nome' => 'J.R.R. Tolkien',
            ],
            [
                'nome' => 'Stephen King',
            ],
            [
                'nome' => 'Gabriel García Márquez',
            ],
            [
                'nome' => 'Virginia Woolf',
            ],
            [
                'nome' => 'Harper Lee',
            ],
            [
                'nome' => 'Leo Tolstoy',
            ],
            [
                'nome' => 'Charles Dickens',
            ],
            [
                'nome' => 'Herman Melville',
            ],
            [
                'nome' => 'Franz Kafka',
            ],
            [
                'nome' => 'J.D. Salinger',
            ],
            [
                'nome' => 'Ray Bradbury',
            ],
            [
                'nome' => 'John Steinbeck',
            ],
            [
                'nome' => 'Margaret Atwood',
            ],
        ]);
    }
}

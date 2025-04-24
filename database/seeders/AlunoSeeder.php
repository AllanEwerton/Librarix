<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class AlunoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('alunos')->insert([
            ['nome' => 'John Doe', 'email' => 'john.doe@example.com', 'created_at' => now(), 'updated_at' => now(), 'telefone' => '1234567890', 'turma' => 'A1', 'turno' => 'manhã', 'matricula' => '2023001', 'status' => 'ativo'],
            ['nome' => 'Jane Smith', 'email' => 'jane.smith@example.com', 'created_at' => now(), 'updated_at' => now(), 'telefone' => '0987654321', 'turma' => 'A2', 'turno' => 'tarde', 'matricula' => '2023002', 'status' => 'ativo'],
            ['nome' => 'Alice Johnson', 'email' => 'alice.johnson@example.com', 'created_at' => now(), 'updated_at' => now(), 'telefone' => '1122334455', 'turma' => 'A3', 'turno' => 'noite', 'matricula' => '2023003', 'status' => 'ativo'],
            ['nome' => 'Bob Brown', 'email' => 'bob.brown@example.com', 'created_at' => now(), 'updated_at' => now(), 'telefone' => '2233445566', 'turma' => 'A4', 'turno' => 'manhã', 'matricula' => '2023004', 'status' => 'ativo'],
            ['nome' => 'Charlie Davis', 'email' => 'charlie.davis@example.com', 'created_at' => now(), 'updated_at' => now(), 'telefone' => '3344556677', 'turma' => 'A5', 'turno' => 'tarde', 'matricula' => '2023005', 'status' => 'ativo'],
        ]);
    }
}

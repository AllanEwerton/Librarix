<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmprestimoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('emprestimos')->insert([
            [
                'data_emprestimo' => now(),
                'data_devolucao_prevista' => now()->addDays(7),
                'data_devolucao_real' => null,
                'renovacao' => 0,
                'data_renovacao' => null,
                'aluno_id' => \App\Models\Aluno::factory()->create()->id,
                'status' => 'ativo',
            ],
            [
                'data_emprestimo' => now(),
                'data_devolucao_prevista' => now()->addDays(7),
                'data_devolucao_real' => null,
                'renovacao' => 0,
                'data_renovacao' => null,
                'aluno_id' => \App\Models\Aluno::factory()->create()->id,
                'status' => 'ativo',
            ],
            [
                'data_emprestimo' => now(),
                'data_devolucao_prevista' => now()->addDays(7),
                'data_devolucao_real' => null,
                'renovacao' => 0,
                'data_renovacao' => null,
                'aluno_id' => \App\Models\Aluno::factory()->create()->id,
                'status' => 'ativo',
            ],
            [
                'data_emprestimo' => now(),
                'data_devolucao_prevista' => now()->addDays(7),
                'data_devolucao_real' => null,
                'renovacao' => 0,
                'data_renovacao' => null,
                'aluno_id' => \App\Models\Aluno::factory()->create()->id,
                'status' => 'ativo',
            ],
            [
                'data_emprestimo' => now(),
                'data_devolucao_prevista' => now()->addDays(7),
                'data_devolucao_real' => null,
                'renovacao' => 0,
                'data_renovacao' => null,
                'aluno_id' => \App\Models\Aluno::factory()->create()->id,
                'status' => 'ativo',
            ],
            [
                'data_emprestimo' => now(),
                'data_devolucao_prevista' => now()->addDays(7),
                'data_devolucao_real' => null,
                'renovacao' => 0,
                'data_renovacao' => null,
                'aluno_id' => \App\Models\Aluno::factory()->create()->id,
                'status' => 'ativo',
            ],
            [
                'data_emprestimo' => now(),
                'data_devolucao_prevista' => now()->addDays(7),
                'data_devolucao_real' => null,
                'renovacao' => 0,
                'data_renovacao' => null,
                'aluno_id' => \App\Models\Aluno::factory()->create()->id,
                'status' => 'ativo',
            ],
            [
                'data_emprestimo' => now(),
                'data_devolucao_prevista' => now()->addDays(7),
                'data_devolucao_real' => null,
                'renovacao' => 0,
                'data_renovacao' => null,
                'aluno_id' => \App\Models\Aluno::factory()->create()->id,
                'status' => 'ativo',
            ],
            [
                'data_emprestimo' => now(),
                'data_devolucao_prevista' => now()->addDays(7),
                'data_devolucao_real' => null,
                'renovacao' => 0,
                'data_renovacao' => null,
                'aluno_id' => \App\Models\Aluno::factory()->create()->id,
                'status' => 'ativo',
            ],
            [
                'data_emprestimo' => now(),
                'data_devolucao_prevista' => now()->addDays(7),
                'data_devolucao_real' => null,
                'renovacao' => 0,
                'data_renovacao' => null,
                'aluno_id' => \App\Models\Aluno::factory()->create()->id,
                'status' => 'ativo',
            ],
        ]);
    }
}

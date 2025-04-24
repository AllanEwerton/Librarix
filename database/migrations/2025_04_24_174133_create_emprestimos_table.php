<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('emprestimos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aluno_id')->constrained('alunos')->onDelete('cascade');
            $table->dateTime('data_emprestimo');
            $table->dateTime('data_devolucao_prevista');
            $table->dateTime('data_devolucao_real')->nullable();
            $table->dateTime('data_renovacao')->nullable();
            $table->boolean('renovacao')->default(false);
            $table->enum('status', ['ativo', 'devolvido', 'atrasado'])->default('ativo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emprestimos');
    }
};

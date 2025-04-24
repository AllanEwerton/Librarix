<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Emprestimo extends Model
{
    use HasFactory;
    protected $fillable = [
        'aluno_id',
        'data_emprestimo',
        'data_devolucao_prevista',
        'data_devolucao_real',
        'renovacao',
        'data_renovacao',
        'status'
    ];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }

    public function livros()
    {
        return $this->belongsToMany(Livro::class, 'itens_emprestimos');
    }
}

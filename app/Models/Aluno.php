<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use app\Models\Classes;

class Aluno extends Model
{
    use hasFactory;
    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'turma',
        'turno',
        'matricula',
        'status'
    ];
    public function emprestimos()
    {
        return $this->belongsToMany(Emprestimo::class, 'itens_emprestimos');
    }
    public function classe()
    {
        return $this->belongsTo(Classes::class);
    }
}

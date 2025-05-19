<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Classes;

class Aluno extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'matricula',
        'status',
        'classe_id'
    ];

    public function emprestimos()
    {
        return $this->belongsToMany(Emprestimo::class, 'itens_emprestimos');
    }

    public function classe()
    {
        return $this->belongsTo(Classes::class, 'classe_id');
    }
}

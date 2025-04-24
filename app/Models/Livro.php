<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Livro extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo',
        'descricao',
        'imagem',
        'autor_id',
        'categoria_id',
        'isbn',
        'ano_publicacao',
        'quantidade',
        'status'
    ];
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
    public function autor()
    {
        return $this->belongsTo(Autor::class);
    }

    public function emprestimos()
    {
        return $this->belongsToMany(Emprestimo::class, 'itens_emprestimos');
    }
}

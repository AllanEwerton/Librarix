<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItensEmprestimo extends Model
{
    use HasFactory;
    protected $fillable = [
        'emprestimo_id',
        'livro_id'
    ];
    public function emprestimo()
    {
        return $this->belongsTo(Emprestimo::class);
    }
    public function livro()
    {
        return $this->belongsTo(livro::class);
    }
}

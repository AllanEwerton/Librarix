<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;

class Autor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
    ];
    protected $table = 'autores';

    public function livros()
    {
        return $this->hasMany(livro::class);
    }
}

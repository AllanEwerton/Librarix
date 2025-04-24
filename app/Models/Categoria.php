<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome'
    ];
    protected $table = 'categorias';

    public function books()
    {
        return $this->hasMany(Livro::class);
    }
}

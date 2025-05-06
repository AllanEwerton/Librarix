<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;
    protected $table = 'classes';
    protected $fillable = [
        'nome', 'ano', 'turno', 'nivel', 'status'
    ];

    public function aluno()
    {
        return $this->hasMany(Aluno::class);
    }

}

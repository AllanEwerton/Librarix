<?php

namespace App\Livewire\Livros;

use App\Models\Livro;
use Livewire\Component;

class Lista extends Component
{
    public $livros = [];
    public $livroId;

    public function mount(){
        $this->carregarLivros();
    }

    public function carregarLivros(){
        $this->livros = Livro::orderBy('titulo', 'asc')->get();
    }


    public function render()
    {
        return view('livewire.livros.lista');
    }
}

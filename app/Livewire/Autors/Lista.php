<?php

namespace App\Livewire\Autors;

use App\Models\Autor;
use Livewire\Component;

class Lista extends Component
{
    public $autores = [];

    public function mount(){
        $this->carregaAutors();
    }

    public function carregaAutors(){
        $this->autores = Autor::orderBy('nome', 'asc')->get();
    }

    public function render()
    {
        return view('livewire.autors.lista');
    }
}

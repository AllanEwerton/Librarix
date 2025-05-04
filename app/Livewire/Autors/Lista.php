<?php

namespace App\Livewire\Autors;

use App\Models\Autor;
use Livewire\Component;
use Livewire\Attributes\On;

class Lista extends Component
{
    public $autores = [];
    public $autorId;
    public $nome;




    public function abrirModal()
{
    $this->dispatch('abrirModal', 'livewire.autors.form');
}

    public function mount(){
        $this->carregaAutors();
    }
    #[On('salvo')]
    public function carregaAutors(){
        $this->autores = Autor::orderBy('nome', 'asc')->get();
    }

    public function render()
    {
        return view('livewire.autors.lista');
    }
}

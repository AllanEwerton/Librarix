<?php

namespace App\Livewire\Categorias;

use Livewire\Component;
use App\Models\Categoria;

class Lista extends Component
{
    public $categorias = [];

    public function mount()
    {
        $this->carregaCategorias();
    }
    public function carregaCategorias()
    {
        $this->categorias = Categoria::orderBy('nome', 'asc')->get();
    }
    public function render()
    {
        return view('livewire.categorias.lista');
    }
}

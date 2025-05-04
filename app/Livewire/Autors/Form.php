<?php

namespace App\Livewire\Autors;

use Livewire\Component;
use App\Models\Autor;

class Form extends Component
{
    public $nome;

    public function salvar()
    {
        $this->validate(['nome' => 'required|min:3|max:255',]);
        

        Autor::create(['nome' => $this->nome,]);

        $this->dispatch('salvo');

    }


    public function render()
    {
        return view('livewire.autors.form');
    }
}

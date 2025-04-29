<?php

namespace App\Livewire\Autors;

use Livewire\Component;
use App\Models\Autor;
use Livewire\Attributes\On;

class Form extends Component
{

    public $idAutor;
    public $nome;

    public function salvar()
    {
        $this->validate([
            'nome' => 'required|min:3|max:255',
        ]);

        if ($this->idAutor) {
            $autor = Autor::find($this->idAutor);
            $autor->update([
                'nome' => $this->nome,
            ]);
        } else {
            Autor::create([
                'nome' => $this->nome,
            ]);
        }

        $this->dispatch('salvo');

    }


    public function render()
    {
        return view('livewire.autors.form');
    }
}

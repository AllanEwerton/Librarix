<?php

namespace App\Livewire\Autors;

use Livewire\Component;
use App\Models\Autor;
use Livewire\Attributes\On;


class Form extends Component
{
    public $nome;
    public $idAutor;


    public function mount($id)
    {
        if ($id) {
            $this->idAutor =$id;
            $autor = Autor::find($id);
            $this->nome = $autor->nome;
        }
    }

    public function salvar()
    {
        $this->validate(['nome' => 'required|min:3|max:255',]);


        if($this->idAutor){
            $autor = Autor::find($this->idAutor);
            $autor->update(['nome' => $this->nome, ]);
            session()->flash('message', 'Autor '.$this->nome.' atualizado com sucesso.');
        }else{
            $autor = Autor::create(['nome' => $this->nome, ]);
            session()->flash('message', 'Autor '.$this->nome.' cadastrado com sucesso.');
        }

    }


    public function render()
    {
        return view('livewire.autors.form');
    }
}

<?php

namespace App\Livewire\Components;

use Livewire\Attributes\On;
use Livewire\Component;

class Modal extends Component
{
    public $isOpen = false;
    public $view = null;
    public $title = null;
    public $id = null;


    #[On('abrirModal')]
    public function abrirModal($data,$title, $id)
    {
        $this->isOpen = true;
        $this->id = $id;
        $this->view = $data;
        $this->title = $title;


    }


    #[On('salvo')]
    public function fecharModal()
    {
        $this->isOpen = false;

        $this->view = null;
    }

    public function render()
    {
        return view('livewire.components.modal', ['view' => $this->view]);
    }
}

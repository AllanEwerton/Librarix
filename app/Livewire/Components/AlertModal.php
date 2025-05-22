<?php

namespace App\Livewire\Components;

use Livewire\Attributes\On;
use Livewire\Component;


class AlertModal extends Component
{
    public $show = false;
    public $type = 'success';
    public $title = '';
    public $message = '';

    #[On('showAlert')]
    public function show($type = 'success', $title = '', $message = '')
    {
        $this->type = $type;
        $this->title = $title;
        $this->message = $message;
        $this->show = true;
    }

    public function close()
    {
        $this->show = false;
    }

    public function render()
    {
        return view('livewire.components.alert-modal');
    }
}

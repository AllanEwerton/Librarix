<?php

namespace App\Livewire\Classes;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Classes;

class Lista extends Component
{

    use WithPagination;

    public $search = '';
    public $showInactive = false;
    public $perPage = 10;

    public function edit($id)
    {
        $this->dispatch('edit', $id);

    }

    public function render()
    {
        return view('livewire.classes.lista', [
            'classes' => Classes::query()
                ->when($this->search, function ($query) {
                    $query->where('nome', 'like', '%'.$this->search.'%')
                          ;
                })
                ->when(!$this->showInactive, function ($query) {
                    $query->where('status', 'ativo');
                })
                ->orderBy('nome')
                ->paginate($this->perPage)
        ]);
    }


}
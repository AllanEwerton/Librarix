<?php

namespace App\Livewire\Alunos;

use App\Models\Aluno;
use Livewire\Component;
use Livewire\WithPagination;

class Lista extends Component
{
    use WithPagination;

    public $search = '';
    public $showInactive = false;
    public $perPage = 10;

    public function render()
{
    return view('livewire.alunos.lista', [
        'alunos' => Aluno::with('classe') // Carrega a relação antecipadamente
            ->when($this->search, function ($query) {
                $query->where('nome', 'like', '%'.$this->search.'%')
                      ->orWhere('matricula', 'like', '%'.$this->search.'%');
            })
            ->when(!$this->showInactive, function ($query) {
                $query->where('status', 'ativo');
            })
            ->orderBy('nome')
            ->paginate($this->perPage)
    ]);
}
}

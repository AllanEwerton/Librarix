<?php

namespace App\Livewire\Classes;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Classes;

class Lista extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'nome'; // Definindo valor padrão
    public $sortDirection = 'asc';
    public $perPage = 10;
    public $showInactive = false;

    protected $queryString = [
        'search' => ['except' => ''],
        'sortField' => ['except' => 'nome'],
        'sortDirection' => ['except' => 'asc'],
    ];

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }

    public function render()
    {
        return view('livewire.classes.lista', [
            'classes' => Classes::query()
                ->when($this->search, function ($query) {
                    $query->where('nome', 'like', '%'.$this->search.'%')
                          ->orWhere('ano', 'like', '%'.$this->search.'%');
                })
                ->when(!$this->showInactive, function ($query) {
                    $query->where('status', 'ativo');
                })
                ->orderBy($this->sortField, $this->sortDirection)
                ->paginate($this->perPage),
            'sortField' => $this->sortField, // Passando explicitamente para a view
            'sortDirection' => $this->sortDirection // Passando explicitamente para a view
        ]);
    }
}

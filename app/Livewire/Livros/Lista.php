<?php

namespace App\Livewire\Livros;

use App\Models\Livro;
use App\Models\Categoria;
use Livewire\Attributes\Url;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Lista extends Component
{
    use WithPagination;

    #[Url]
    public $busca = '';

    #[Url]
    public $categoria_id = '';

    #[Url]
    public $disponivel = '';

    #[Url]
    public $ordenacao = 'titulo_asc';

    #[On('livroSalvo')]
    public function carregarLivros()
    {
        $this->resetPage(); // Reseta a paginação quando um novo livro é salvo
    }

    public function limparFiltros()
    {
        $this->reset(['busca', 'categoria_id', 'disponivel', 'ordenacao']);
        $this->resetPage();
    }

    public function render()
    {
        $livros = Livro::query()
            ->with(['categoria']) // Carrega a relação categoria
            ->when($this->busca, function ($query) {
                $query->where(function ($q) {
                    $q->where('titulo', 'like', '%' . $this->busca . '%')
                      ->orWhere('descricao', 'like', '%' . $this->busca . '%');
                });
            })
            ->when($this->categoria_id, function ($query) {
                $query->where('categoria_id', $this->categoria_id);
            })
            ->when($this->disponivel !== '', function ($query) {
                if ($this->disponivel === '1') {
                    $query->where('quantidade', '>', 0);
                } elseif ($this->disponivel === '0') {
                    $query->where('quantidade', '<=', 0);
                }
            })
            ->when($this->ordenacao, function ($query) {
                $parts = explode('_', $this->ordenacao);
                $field = $parts[0];
                $direction = $parts[1] ?? 'asc';

                match ($field) {
                    'titulo' => $query->orderBy('titulo', $direction),
                    'ano' => $query->orderBy('ano_publicacao', $direction),
                    'categoria' => $query->orderBy(
                        Categoria::select('nome')
                            ->whereColumn('categorias.id', 'livros.categoria_id'),
                        $direction
                    ),
                    default => $query->orderBy('titulo', 'asc')
                };
            })
            ->paginate(12);

        return view('livewire.livros.lista', [
            'livros' => $livros,
            'categorias' => Categoria::orderBy('nome')->get(),
        ]);
    }
}

<?php

namespace App\Livewire\Livros;

use App\Models\Autor;
use App\Models\Categoria;
use App\Models\Livro;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Form extends Component
{
    use WithFileUploads;

    public $livroId;
    public $titulo, $descricao, $ano_publicacao, $quantidade, $imagem, $isbn;
    public $autorNome, $categoriaNome;
    public $sugestaoAutor = [], $sugestaoCategoria = [];
    public $idAutorSelecionado = null, $idCategoriaSelecionado = null;

    protected $listeners = ['editarLivro' => 'loadLivro'];

    public function rules()
    {
        return [
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'ano_publicacao' => 'nullable|integer|min:1700|max:' . date('Y'),
            'quantidade' => 'required|integer|min:0',
            'imagem' => 'nullable|image|max:2048', // 2MB max
            'isbn' => 'required|string|max:17|unique:livros,isbn,' . $this->livroId,
            'autorNome' => 'required|string|max:255',
            'categoriaNome' => 'required|string|max:255',
        ];
    }


    public function loadLivro($id)
    {
        $livro = Livro::findOrFail($id);
        $this->livroId = $livro->id;
        $this->titulo = $livro->titulo;
        $this->descricao = $livro->descricao;
        $this->ano_publicacao = $livro->ano_publicacao;
        $this->quantidade = $livro->quantidade;
        $this->imagem = $livro->imagem;
        $this->isbn = $livro->isbn;
        $this->autorNome = $livro->autor->nome;
        $this->idAutorSelecionado = $livro->autor_id;
        $this->categoriaNome = $livro->categoria->nome;
        $this->idCategoriaSelecionado = $livro->categoria_id;
    }

    public function updateAutorNome($value)
    {
        $this->autorNome = $value;
        $this->idAutorSelecionado = null;
        $this->sugestaoAutor = $value ?
            Autor::withCount('livros')
                ->where('nome', 'like', '%' . $value . '%')
                ->orderBy('livros_count', 'desc')
                ->limit(5)
                ->get() : [];
    }

    public function updateCategoriaNome($value)
    {
        $this->categoriaNome = $value;
        $this->idCategoriaSelecionado = null;
        $this->sugestaoCategoria = $value ?
            Categoria::withCount('livros')
                ->where('nome', 'like', '%' . $value . '%')
                ->orderBy('livros_count', 'desc')
                ->limit(5)
                ->get() : [];
    }

    public function selectAutor($id)
    {
        $autor = Autor::find($id);
        if ($autor) {
            $this->idAutorSelecionado = $id;
            $this->autorNome = $autor->nome;
            $this->sugestaoAutor = [];
        }
    }

    public function selectCategoria($id)
    {
        $categoria = Categoria::find($id);
        if ($categoria) {
            $this->idCategoriaSelecionado = $id;
            $this->categoriaNome = $categoria->nome;
            $this->sugestaoCategoria = [];
        }
    }

    public function closeSugestionsA()
    {
        $this->sugestaoAutor = [];

    }
    public function closeSugestionsC()
    {
        $this->sugestaoCategoria = [];

    }

    public function save()
    {
        $this->validate();

        // Processar upload da imagem
        $imagemPath = $this->imagem;
        if ($this->imagem && !is_string($this->imagem)) {
            $imagemPath = $this->imagem->store('livros', 'public');
        }

        // Criar ou atualizar autor
        $autor = $this->idAutorSelecionado ?
            Autor::find($this->idAutorSelecionado) :
            Autor::create(['nome' => $this->autorNome]);

        // Criar ou atualizar categoria
        $categoria = $this->idCategoriaSelecionado ?
            Categoria::find($this->idCategoriaSelecionado) :
            Categoria::create(['nome' => $this->categoriaNome]);

        // Dados do livro
        $data = [
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'ano_publicacao' => $this->ano_publicacao,
            'quantidade' => $this->quantidade,
            'imagem' => $imagemPath,
            'isbn' => $this->isbn,
            'autor_id' => $autor->id,
            'categoria_id' => $categoria->id,
        ];

        // Salvar livro
        if ($this->livroId) {
            $livro = Livro::find($this->livroId);

            // Remover imagem antiga se foi alterada
            if ($livro->imagem && $livro->imagem !== $imagemPath) {
                Storage::disk('public')->delete($livro->imagem);
            }

            $livro->update($data);
           $this->dispatch('showAlert', 'success', 'Sucesso!', 'Turma cadastrada com sucesso!');
            $this->reset();
        } else {
            Livro::create($data);
            $this->dispatch('showAlert', 'success', 'Sucesso!', 'Turma atualizada com sucesso!');
            $this->reset();
        }


    }

    public function render()
    {
        return view('livewire.livros.form');
    }
}
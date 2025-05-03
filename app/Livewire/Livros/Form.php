<?php

namespace App\Livewire\Livros;

use App\Models\Autor;
use App\Models\Categoria;
use App\Models\Livro;
use Livewire\Component;
use Livewire\WithFileUploads; // Importar o trait
use Illuminate\Support\Facades\Storage;

class Form extends Component
{
    use WithFileUploads; // Usar o trait

    public $livroId;

    public $titulo, $descricao, $ano_publicacao, $quantidade, $imagem, $status, $isbn, $autor_id, $categoria_id;
    public $autorNome, $categoriaNome;
    public $sugestaoAutor = [], $sugestaoCategoria = [];
    public $idAutorSelecionado = null, $idCategoriaSelecionado = null;

    public $livro = [];

    public function rules()
    {
        return [
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'ano_publicacao' => 'nullable|integer|min:1700|max:' . date('Y'),
            'quantidade' => 'required|integer|min:0',
            'imagem' => 'nullable|image|max:2048',
            'isbn' => 'required|string|max:17|unique:livros,isbn,' . $this->livroId,
        ];
    }

    public function updateAutorNome($nome)
    {
        $this->sugestaoAutor = $nome ? Autor::where('nome', 'like', '%' . $nome . '%')->get() : [];
    }

    public function updateCategoriaNome($nome)
    {
        $this->sugestaoCategoria = $nome ? Categoria::where('nome', 'like', '%' . $nome . '%')->get() : [];
    }

    public function selectAutor($id)
    {
        $autor = Autor::find($id);
        if ($autor) {
            $this->idAutorSelecionado = $autor->id;
            $this->autorNome = $autor->nome;
            $this->sugestaoAutor = [];
        }
    }

    public function selectCategoria($id)
    {
        $categoria = Categoria::find($id);
        if ($categoria) {
            $this->idCategoriaSelecionado = $categoria->id;
            $this->categoriaNome = $categoria->nome;
            $this->sugestaoCategoria = [];
        }
    }

    public function mount($livro = null)
    {
        if ($livro) {
            $this->livro = $livro->toArray();
            $this->titulo = $livro->titulo;
            $this->descricao = $livro->descricao;
            $this->ano_publicacao = $livro->ano_publicacao;
            $this->quantidade = $livro->quantidade;
            $this->imagem = $livro->imagem;
            $this->status = $livro->status;
            $this->isbn = $livro->isbn;
            $this->autor_id = $livro->autor_id;
            $this->categoria_id = $livro->categoria_id;
        }
    }

    public function save()
    {
        $this->validate();

        // Processar o upload da imagem
        if ($this->imagem) {
            $this->imagem = $this->imagem->store('livros', 'public'); // Salva a imagem e retorna o caminho
        }

        if ($this->livroId) {
            $livro = Livro::find($this->livroId);
            if ($livro && $livro->imagem != $this->imagem) {
                Storage::disk('public')->delete($livro->imagem); // Remove a imagem antiga
            }
        }

        $autorId = $this->idAutorSelecionado ?: Autor::firstOrCreate(['nome' => $this->autorNome])->id;
        $categoriaId = $this->idCategoriaSelecionado ?: Categoria::firstOrCreate(['nome' => $this->categoriaNome])->id;

        $data = [
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'ano_publicacao' => $this->ano_publicacao,
            'quantidade' => $this->quantidade,
            'imagem' => $this->imagem, // Salva o caminho da imagem no banco de dados
            'status' => $this->status ?? 'disponivel',
            'isbn' => $this->isbn,
            'autor_id' => $autorId,
            'categoria_id' => $categoriaId,
        ];

        if ($this->livroId) {
            Livro::find($this->livroId)->update($data);
        } else {
            Livro::create($data);
        }

        session()->flash('message', 'Livro "' . $this->titulo . '" salvo com sucesso!');
        $this->reset();
        $this->dispatch('livroSalvo');
    }

    public function render()
    {
        return view('livewire.livros.form');
    }
}

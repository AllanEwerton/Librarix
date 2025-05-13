<?php

namespace App\Livewire\Alunos;

use Livewire\Component;
use App\Models\Aluno;
use App\Models\Classes;
use Illuminate\Validation\Rule;

class Form extends Component
{
    public $aluno_id, $nome, $email, $telefone, $matricula, $status = 'ativo';
    public $classes, $classes_id; // Renomeado $classe para $classes (lista de classes)
    public $classeNome;
    public $sugestaoClasse= [];
    public $idClasseSelecionada = null;

    protected function rules()
{
    return [
        'nome' => 'required|string|max:255',
        'email' => 'required|email|unique:alunos,email,'.$this->aluno_id,
        'telefone' => 'required|string|max:20',
        'matricula' => 'required|string|unique:alunos,matricula,'.$this->aluno_id,
        'status' => 'required|in:ativo,inativo',
        'idClasseSelecionada' => 'required|exists:classes,id'
    ];
}

    public function mount($alunoId = null, $classes_id = null)
    {
        $this->classes = Classes::all(); // Carrega todas as classes

        if ($alunoId) {
            $aluno = Aluno::findOrFail($alunoId);
            $this->fill($aluno->only('nome', 'email', 'telefone', 'matricula', 'status', 'classes_id'));
            $this->aluno_id = $alunoId;
        }

        $this->classes_id = $classes_id ?? $this->classes->first()->id ?? null;
    }

    public function updateCategoriaNome($nome)
    {
         $this->classeNome = $nome;

    if(empty($nome)) {
        // Se o campo estiver vazio, mostra todas as classes
        $this->sugestaoClasse = Classes::all();
    } else {
        // Se estiver digitando, filtra as classes
        $this->sugestaoClasse = Classes::where('nome', 'like', '%' . $nome . '%')->get();
    }
    }

    public function selectClasse($id)
    {
        $classe = Classes::find($id);
    if ($classe) {
        $this->idClasseSelecionada = $classe->id;
        $this->classeNome = $classe->nome;
    }
    }

    public function save()
{
    $this->validate();
    $classes_id = $this->idClasseSelecionada ?: Classes::findOrFail(['nome' => $this->classeNome])->id;

    try {
        $data = [
            'nome' => $this->nome,
            'email' => $this->email,
            'telefone' => $this->telefone,
            'matricula' => $this->matricula,
            'status' => $this->status,
            'classes_id' => $classes_id // Garante que o classes_id está incluído
        ];

        if ($this->aluno_id) {
            $aluno = Aluno::findOrFail($this->aluno_id);
            $aluno->update($data);
            $message = 'Aluno '.$this->nome.' editado com sucesso!';
        } else {
            Aluno::create($data);
            $message = 'Aluno '.$this->nome.' cadastrado com sucesso!';
        }

        $this->reset();
        session()->flash('success', $message);

    } catch (\Exception $e) {
        session()->flash('error', 'Erro ao salvar aluno: '.$e->getMessage());
    }
}
}

<?php

namespace App\Livewire\Alunos;

use Livewire\Component;
use App\Models\Aluno;

class Form extends Component
{
    public $alunoId;
    public $nome, $email, $telefone, $turma, $turno, $matricula, $status;

    public function rules()
    {
        return [
            'nome' => 'required|string|max:255',
            'email' => 'nullable|email|max:255|unique:alunos,email,' . $this->alunoId,
            'telefone' => 'nullable|string|max:20',
            'turma' => 'required|string|max:50',
            'turno' => 'required|in:manhã,tarde,noite',
            'matricula' => 'required|string|max:20|unique:alunos,matricula,' . $this->alunoId,
            'status' => 'required|in:ativo,inativo',
        ];
    }
    public function mount($aluno = null)
    {
        if ($aluno) {
            $this->alunoId = $aluno->id;
            $this->nome = $aluno->nome;
            $this->email = $aluno->email;
            $this->telefone = $aluno->telefone;
            $this->turma = $aluno->turma;
            $this->turno = $aluno->turno;
            $this->matricula = $aluno->matricula;
            $this->status = $aluno->status;
        }
    }
    public function save()
    {
        $this->validate();

        $aluno = Aluno::updateOrCreate(
            ['id' => $this->alunoId],
            [
                'nome' => $this->nome,
                'email' => $this->email,
                'telefone' => $this->telefone,
                'turma' => $this->turma,
                'turno' => $this->turno,
                'matricula' => $this->matricula,
                'status' => $this->status,
            ]
        );

        session()->flash('message', 'Aluno '.$aluno->nome.' salvo com sucesso!');



        $this->reset();
    }



    public function render()
    {
        return view('livewire.alunos.form');
    }
}

<?php

namespace App\Livewire\Classes;

use Livewire\Component;
use App\Models\Classes;
use Illuminate\Validation\Rule; // Adicione esta linha

class Form extends Component
{
    public $id, $nome, $turno, $ano, $nivel, $status;

    public function mount($id = null)
    {
        if ($id) {
            $class = Classes::find($id);
            $this->id = $class->id;
            $this->nome = $class->nome;
            $this->turno = $class->turno;
            $this->ano = $class->ano;
            $this->nivel = $class->nivel;
            $this->status = $class->status;
        }
    }

    public function rules()
    {
        return [
            'nome' => [
                'required',
                'string',
                'max:100',
                Rule::unique('classes')->where(function ($query) {
                    return $query
                        ->where('nome', $this->nome)
                        ->where('ano', $this->ano)
                        ->where('turno', $this->turno)
                        ->where('nivel', $this->nivel);
                })->ignore($this->id) // Ignora o registro atual ao editar
            ],
            'ano' => 'required|integer|min:2000|max:' . (date('Y') + 1),
            'turno' => 'required|in:manhã,tarde,noite',
            'nivel' => 'required|in:fundamental,médio,eja',
        ];
    }

    public function save()
    {
        $this->validate();

        if($this->validate()){
        $data = [
            'nome' => $this->nome,
            'turno' => $this->turno,
            'ano' => $this->ano,
            'nivel' => $this->nivel,
            'status' => $this->id ? $this->status : 'ativo' // Mantém o status ao editar
        ];

        if ($this->id) {
            Classes::find($this->id)->update($data);
            session()->flash('ok', 'Turma "'. $this->nome .'" atualizada com sucesso!');
        } else {
            Classes::create($data);
            session()->flash('ok', 'Turma "'. $this->nome .'" criada com sucesso!');
        }

        $this->reset();
    }
    session()->flash('error', 'Erro ao salvar turma!');
    }

    public function render()
    {
        return view('livewire.classes.form');
    }
}

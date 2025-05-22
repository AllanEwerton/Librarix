<?php

namespace App\Livewire\Classes;

use Livewire\Component;
use App\Models\Classes;
use Illuminate\Validation\Rule; // Adicione esta linha
use Livewire\Attributes\On;

class Form extends Component
{
    public $id, $nome, $turno, $ano, $nivel, $status;

public function resetFields()
{
    $this->id = null;
    $this->nome = null;
    $this->turno = null;
    $this->ano = null;
    $this->nivel = null;
    $this->status = null;
}

#[On('closeedit')]
public function closeedit()
{
    $this->resetFields();
}

    #[On('edit')]
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

        try {
            $data= [
                'nome' => $this->nome,
                'turno' => $this->turno,
                'ano' => $this->ano,
                'nivel' => $this->nivel,
                'status' => $this->status ?? 'ativo'
            ];

        if ($this->id) {
            Classes::find($this->id)->update($data);
            $this->dispatch('showAlert', 'success', 'Sucesso!', 'Turma atualizada com sucesso!');
            $this->resetFields();
        } else {
            Classes::create($data);
            $this->dispatch('showAlert', 'success', 'Sucesso!', 'Turma cadastrada com sucesso!');
        }
        }catch (\Exception $e) {
        $this->dispatch('showAlert', 'error', 'Erro!', 'Erro ao salvar turma: '.$e->getMessage());
    }
    }

    public function render()
    {
        return view('livewire.classes.form');
    }
}

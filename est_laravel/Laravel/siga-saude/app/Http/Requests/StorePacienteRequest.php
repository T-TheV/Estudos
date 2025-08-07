<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class StorePacienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|min:3|max:255',
            'cpf' => 'required|size:14|unique:pacientes',
            'data_nascimento' => 'required|date|before_or_equal:today',
        ];
    }
    public function messages()
{
    return [
        'nome.required' => 'Por favor, preencha o nome do paciente.',
        'nome.min' => 'O nome precisa ter no mínimo 3 caracteres.',
        'cpf.required' => 'Por favor, preencha o CPF do paciente.',
        'cpf.size' => 'O CPF deve ter 14 caracteres, incluindo pontos e traços.',
        'cpf.unique' => 'Este CPF já está cadastrado.',
        'data_nascimento.required' => 'Por favor, preencha a data de nascimento do paciente.',
        'data_nascimento.date' => 'A data de nascimento deve ser uma data válida.',
        'data_nascimento.before_or_equal' => 'A data de nascimento deve ser anterior ou igual a hoje.',
    ];
}
}

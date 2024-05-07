<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocadoraFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|unique|max:120|min:5',
            'preco' => 'required|decimal:11,2',
            'descricao' => 'required|max:120|unique:clientes,email',
            'classificacao' => 'required|max:11|min:11|unique:clientes,cpf',
            'plataformas' =>'required|date',
            'desenvolvedor' => 'required|max:120',
            'distribuidora' => 'required|max:2'
        ];
    }
}

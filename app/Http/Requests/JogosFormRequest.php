<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class JogosFormRequest extends FormRequest
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
            'nome' => 'required|max:120|min:5|unique:jogos,nome',
            'preco' => 'required|decimal:2',
            'descricao' => 'required|max:800|min:10',
            'classificacao' => 'required|max:20|min:5',
            'plataformas' => 'required|max:60|min:3',
            'desenvolvedor' => 'required|max:120|min:2',
            'distribuidora' => 'required|max:120|min:2',
            'categoria' => 'required|max:55|min:3'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => false,
            'error' => $validator->errors()
        ]));
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo Nome é obrigatório',
            'nome.max' => 'O campo Nome deve conter no máximo 120 caracteres',
            'nome.min' => 'O campo Nome deve conter no mínimo 5 caracteres',
            'nome.unique' => 'Nome já cadastrado no sistema',
            'preco.required' => 'O campo Preço é obrigatório',
            'preco.decimal' => 'O campo Preço deve conter apenas valores em decimais',
            'descricao.required' => 'O campo Descrição é obrigatório',
            'descricao.max' => 'O campo Descrição deve conter no máximo 800 caracteres',
            'descricao.min' => 'O campo Descriçaõ deve conter no mínimo 10 caracteres',
            'classificacao.required' => 'O campo Classificação é obrigatório',
            'classificacao.max' => 'O campo Classificação deve conter no máximo 20 caracteres',
            'classificacao.min' => 'O campo Classificação deve conter no mínimo 5 caracteres',
            'plataformas.required' => 'O campo Plataforma é obrigatório',
            'plataformas.max' => 'O campo Plataforma deve conter no máximo 60 caracteres',
            'plataformas.min' => 'O campo Plataforma deve conter no mínimo 3 caracteres',
            'desenvolvedor.required' => 'O campo Desenvolvedor é obrigatório',
            'desenvolvedor.max' => 'O campo Desenvolvedor deve conter no máximo 120 caracteres',
            'desenvolvedor.min' => 'O campo Desenvolvedor deve conter no mínimo 2 caracteres',
            'distribuidora.required' => 'O campo Distribuidora é obrigatório',
            'distribuidora.max' => 'O campo Distribuidora deve conter no máximo 120 caracteres',
            'distribuidora.min' => 'O campo Distribuidora deve conter no mínimo 2 caracteres',
            'categoria.required' => 'O campo Categoria é orbigatório',
            'categoria.max' => 'O campo Categoria deve conter no máximo 55 caracteres',
            'categoria.min' => 'O campo Categoria deve conter no mínimo 3 caracteres'
        ];
    }
}
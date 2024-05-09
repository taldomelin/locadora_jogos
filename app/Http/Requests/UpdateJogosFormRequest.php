<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateJogosFormRequest extends FormRequest
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
                'nome' => 'max:120|min:5|unique:jogos,nome,' .  $this->id,
                'preco' => 'decimal:2',
                'descricao' => 'max:800|min:10',
                'classificacao' => 'max:20|min:5',
                'plataformas' => 'max:60|min:3',
                'desenvolvedor' => 'max:120|min:2',
                'distribuidora' => 'max:120|min:2',
                'categoria' => 'max:55|min:3'
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
            'nome.max' => 'O campo Nome deve conter no máximo 120 caracteres',
            'nome.min' => 'O campo Nome deve conter no mínimo 5 caracteres',
            'preco.decimal' => 'O campo Preço deve conter apenas valores em decimais',
            'descricao.max' => 'O campo Descrição deve conter no máximo 800 caracteres',
            'descricao.min' => 'O campo Descriçaõ deve conter no mínimo 10 caracteres',
            'classificacao.max' => 'O campo Classificacao deve conter no máximo 20 caracteres',
            'classificacao.min' => 'O campo Classificacao deve conter no mínimo 5 caracteres',
            'plataformas.max' => 'O campo Plataforma deve conter no máximo 60 caracteres',
            'plataformas.min' => 'O campo Plataforma deve conter no mínimo 3 caracteres',
            'desenvolvedor.max' => 'O campo Desenvolvedor deve conter no máximo 120 caracteres',
            'desenvolvedor.min' => 'O campo Desenvolvedor deve conter no mínimo 2 caracteres',
            'distribuidora.max' => 'O campo Distribuidora deve conter no máximo 120 caracteres',
            'distribuidora.min' => 'O campo Distribuidora deve conter no mínimo 2 caracteres',
            'categoria.max' => 'O campo Categoria deve conter no máximo 55 caracteres',
            'categoria.min' => 'O campo Categoria deve conter no mínimo 3 caracteres'
        ];
    }
}
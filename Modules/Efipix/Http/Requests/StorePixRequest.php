<?php

namespace Modules\Efipix\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Efipix\Rules\CpfValidationRule;

class StorePixRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome_pagante' => 'required',
            'cpf_pagante' => ['required', new CpfValidationRule],
            'nome_recebedor' => 'required',
            'tipo' => 'required',
            'chave' => 'required',
            'valor' => 'required'
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'nome_pagante.required' => 'Preencha o Nome do Pagante',
            'cpf_pagante.required' => 'Preencha o CPF do Pagante',
            'nome_recebedor.required' => 'Preencha o Nome do Recebedor',
            'tipo.required' => 'Preencha o Tipo de Chave',
            'chave.required' => 'Preencha a Chave do Recebedor',
            'valor.required' => 'Preencha o Valor'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}

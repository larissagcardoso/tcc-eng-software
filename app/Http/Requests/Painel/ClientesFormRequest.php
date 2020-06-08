<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;

class ClientesFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:100',
            'cpf' => 'required|max:12',
            'rg' => 'required|min:8|max:9',
            'endereco'=>'required|max:150',
            'plano' => 'required',
            'dia_pagamento'=> 'numeric',
            'dia_pagamento' => 'required|min:1|max:2'

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é de preenchimento obrigatório!',
            'cpf.numeric' => 'O campo aceita somente números!',
            'cpf.required' => 'O campo CPF é de preenchimento obrigatório!',
            'rg.required' => 'O campo RG é de preenchimento obrigatório!',
            'endereco.required'=> 'O campo endereço é obrigatório!',
            'plano.required'=> 'O campo plano é obrigatório!',
            'plano.max' => 'O campo PLANO deverá ter no máximo 11 caracteres',
            'cpf.max' => 'O campo CPF deverá ter no máximo 11 caracteres',
            'cpf.min' =>'O cpf deve ter pelo menos 11 caracteres.',
            'rg.min' => 'O rg deve ter pelo menos 8 caracteres.',
            'rg.max' => 'O campo deverá ter no máximo 8 caracteres',
            'dia_pagamento.required'=>'O campo Dia Pagamento  é obrigatório!',
            'dia_pagamento.numeric' => 'O campo Dia Pagamento aceita somente números!',
            'dia_pagamento.max' => 'O campo dia de pagamento não pode ter mais que 2 caracteres.'
        ];
    }

}

<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;

class InstrutoresFormRequest extends FormRequest
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
            'cpf' => 'required|max:11',
            'rg' => 'required|max:8',
            'atividades' => 'required',
        ];
    }

    public function messages(){

              return[
                'name.required' => 'O campo nome é de preenchimento obrigatório!',
                'cpf.numeric' => 'O campo aceita somente números!',
                'cpf.required' => 'O campo CPF é de preenchimento obrigatório!',
                'rg.required' => 'O campo RG é de preenchimento obrigatório!',
                'atividades.required'=> 'O campo categoria é obrigatório!',
                'cpf.max' => 'O campo deverá ter no máximo 11 caracteres',
                'cpf.min' =>'O cpf deve ter pelo menos 11 caracteres.',
                'rg.min' => 'O rg deve ter pelo menos 8 caracteres.',
                'rg.max' => 'O campo deverá ter no máximo 8 caracteres',
        ];
}

}

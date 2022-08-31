<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTimesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //true
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required|max:50|unique:times|min:2',
            'pais' => 'required|max:100|min:2',
            'ano_fundacao' => 'required|max:2022|min:1800|integer'
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campos nome é obrigatório',
            'nome.max' => 'O tamanho máximo do nome é 50 caracteres',
            'nome.min' => 'O tamanho mínimo do nome é 2 caracteres',
            'nome.unique' => 'O nome do time já está cadastrado',
            'pais.required' => 'O campos país é obrigatório',
            'pais.max' => 'O tamanho máximo do país é 100 caracteres',
            'pais.min' => 'O tamanho mínimo do país é 2 caracteres',
            'pais.unique' => 'O nome do país já está cadastrado',
            'ano_fundacao' => 'O campos ano de fundação é obrigatório',
            'ano_fundacao.max' => 'O tamanho máximo do ano é 2022 caracteres',
            'ano_fundacao.min' => 'O tamanho máximo do ano é 1800 caracteres',
            'ano_fundacao.integer' => 'O ano deve ser inteiro',
        ];
    }

}

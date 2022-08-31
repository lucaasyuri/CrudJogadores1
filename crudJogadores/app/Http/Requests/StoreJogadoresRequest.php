<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJogadoresRequest extends FormRequest
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
            'nome' => 'required|string|max:100|min:2',
            'posicao' => 'required|string|max:50|min:2',
            'numero' => 'required|integer|max:100|min:0',
            'pais' => 'required|string|max:100|min:2',
            'nascimento' => 'date|before:today',
            'time_id' => 'required|integer|exists:times,id'
        ];
        //max/min: maximo e mínimo de caracteres no campo | before:today: data anterior ao dia de hoje
        //exists: verifica se o time existe (exists:"tabela", "coluna")
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório',
            'nome.string' => 'O campo nome deve ser do tipo string',
            'nome.max' => 'O tamanho máximo do nome é 100 caracteres',
            'nome.min' => 'O tamanho mínimo do nome é 2 caracteres',
            'posicao.required' => 'O campo posição é obrigatório',
            'posicao.string' => 'O campo posição deve ser do tipo string',
            'posicao.max' => 'O tamanho máximo do nome é 50 caracteres',
            'posicao.min' => 'O tamanho mínimo do nome é 2 caracteres',
            'numero.required' => 'O campo número é obrigatório',
            'numero.integer' => 'O campo número deve ser inteiro',
            'numero.max' => 'O tamanho máximo do nome é 100 caracteres',
            'numero.min' => 'O tamanho mínimo do nome é 0 caracteres',
            'pais.required' => 'O campo país é obrigatório',
            'pais.string' => 'O campo país deve ser do tipo string',
            'pais.max' => 'O tamanho máximo do nome é 100 caracteres',
            'pais.min' => 'O tamanho mínimo do nome é 2 caracteres',
            'nascimento.date' => 'O campo data de nascimento deve ser do tipo date',
            'nascimento.before' => 'O campo data de nascimento deve ser anterior ao dia de hoje',
            'time_id.required' => 'O campo time é obrigatório',
            'time_id.integer' => 'O campo time deve ser do tipo inteiro',
            'time_id.exists' => 'O campo time deve ser equivalente ao id de um time existente',
        ];
    }

}

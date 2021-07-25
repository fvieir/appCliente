<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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

    public function messages()
    {
        return [
            'nome.required'=>'Preencha um nome',
            'nome.max' => 'Nome deve conter no maximo 10 caracter',
            'email.email'=>'Forneca uma email valido',
            'email.required'=>'Forneca um e-mail'
        ];
    }

    public function rules()
    {
        return [
            'nome'=>'required|max:10',
            'email'=>'required|email',
            'endereco'=>'required'
        ];
    }
}

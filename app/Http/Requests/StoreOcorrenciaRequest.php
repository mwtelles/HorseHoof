<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class StoreOcorrenciaRequest extends FormRequest
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
            'nome'=>'required',
            'cidade_id'=>'required|exists:cidades,id',
            'cavalo_raca_id'=>'required|exists:cavalo_racas,id',
            'apelido'=>'required',
            'sexo'=>'required|in:M,F',
            'idade'=>'required|string',

        ];
    }
}

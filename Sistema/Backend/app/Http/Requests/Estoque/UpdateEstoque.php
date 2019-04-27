<?php

namespace App\Http\Requests\Estoque;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateEstoque extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fk_id_produto'     => 'required|integer',
            'fk_id_loja'     => 'required|integer',
            'quantidade'        => 'required|integer'
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

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {

        if ($validator->fails()) {
            throw new HttpResponseException(response()->json([
                'msg'       => 'Ops! Algum campo obrigatório não foi preenchido.',
                'status'    => false,
                'errors'    => $validator->errors(),
                'url'       => route('estoques.update')
            ], 403));
       }
    }
}
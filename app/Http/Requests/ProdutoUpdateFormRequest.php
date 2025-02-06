<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProdutoUpdateFormRequest extends FormRequest
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
            'nome'=> 'min:10|max:100',
            'codigo' =>'min:10|max:100',
             'preco'=>'min:10|max:100',
             'quantidade_estoque'=>'min:10|max:100',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        
   
        throw new HttpResponseException(
            response()->json([
                'status' => false,
                'message' => 'erro de validação',
                'errors'=> $validator->errors()
            ], 422));
        
    }

    public function messages()
    {
     return [
         
         'nome.min'=> 'o campo deve conter no minimo 10 caracteres',
         'nome.max'=> 'o campo deve conter no maximo 100 caracteres',

       
        'codigo.min'=> 'o campo deve conter no minimo 10 caracteres',
        'codigo.max'=> 'o campo deve conter no maximo 100 caracteres',

      
        'preco.min'=> 'o campo deve conter no minimo 10 caracteres',
        'preco.max'=> 'o campo deve conter no maximo 100 caracteres',
       
        
        'quantidade_estoque.min'=> 'o campo deve conter no minimo 10 caracteres',
        'quantidade_estoque.max'=> 'o campo deve conter no maximo 100 caracteres',
         
         
     ];

}
}

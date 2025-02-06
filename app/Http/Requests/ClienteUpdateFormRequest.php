<?php

namespace App\Http\Requests;

use Dotenv\Validator;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Nette\Utils\Validators;

class ClienteUpdateFormRequest extends FormRequest
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
            'email' =>'min:10|max:100',
             'telefone'=>'min:10|max:100',
             'endereco'=>'min:10|max:100',
           
        ];
    }


    protected function failedValidation(ValidationValidator $validator)
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

        
        'email.min'=> 'o campo deve conter no minimo 10 caracteres',
        'email.max'=> 'o campo deve conter no maximo 100 caracteres',

        
        'telefone.min'=> 'o campo deve conter no minimo 10 caracteres',
        'telefone.max'=> 'o campo deve conter no maximo 100 caracteres',
       
       
        'endereco.min'=> 'o campo deve conter no minimo 10 caracteres',
        'endereco.max'=> 'o campo deve conter no maximo 100 caracteres',
         
         
     ];









}
}

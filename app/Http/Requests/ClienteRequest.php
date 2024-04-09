<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class ClienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|max:120|min:5',
             'endereco' => 'required|max:120|min:2',
             'telefone' => 'required|max:11|min:10|unique:clientes,telefone',
            'email' => 'required|email|unique:clientes,email',
            'endereco' => 'required|max:120|min:2',
            'cpf' => 'required|max:11|min:11|unique:clientes,cpf',
            'password' => 'required',
            'imagem'=>'required'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => $validator->errors()
        ]));
    }
    public function messages(){

        return[
            'nome.required' => 'o nome é obrigatorio',
            'nome.max' => 'o campo nome deve contar no maximo 120 caracteres',
            'nome.min' => 'o campo nome deve contar no minimo 5 caracteres',
 'endereco.required' => 'o campo endereco é obrigatorio',
            'endereco.max' => 'o campo endereco deve contar no maximo 120 caracteres',
            'endereco.min' => 'o campo endereco deve contar no minimo 2 caracteres',
            'telefone.required' => 'o telefone é obrigatorio',
            'telefone.max' => 'o campo telefone deve contar no maximo 11 caracteres',
            'telefone.min' => 'o campo telefone deve contar no minimo 10 caracteres',
            'telefone.unique' => 'telefone já cadastrado no sistema',
            'email.required' => 'o email é obrigatorio',
            'email.email' => 'formato de email invalido',
            'email.unique' => 'email ja cadastrado no sistema',
            'cpf.required' => 'o cpf é obrigatorio',
            'cpf.max' => 'o campo cpf deve contar no maximo 11 caracteres',
            'cpf.min' => 'o campo cpf deve contar no minimo 11 caracteres',
            'cpf.unique' => 'cpf ja cadastrado no sistema',
            'password.required' => 'a senha obrigatorio',
            'iamgem.required' => 'O campo imagem é obrigatório'
        ];
    }
}

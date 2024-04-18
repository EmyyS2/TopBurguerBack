<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class CarrinhoRequest extends FormRequest
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
            'clientes_id'=> 'required',
            'produto_id'=> 'required',
            'status'=>'required|max:100|min:50',
            'total'=>'required|decimal:2'
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
                'clientes_id.required' => 'o cliente é obrigatorio',
                'produto_id.required' => 'o produto é obrigatorio',
                'status.required'=>'o status'
            ];
            }
        }
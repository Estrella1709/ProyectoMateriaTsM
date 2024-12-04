<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validarResVyH extends FormRequest
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
            'tarjeta'=>'required | numeric | digits:16',
            'mes_exp' => 'required | numeric | digits:2 | min:01 | max:12',
            'year_exp' => 'required | numeric | digits:2 | min:24 | max:35',
            'cvv'=>'required | numeric | digits:3',
        ];
    }

    public function messages()
    {
        return [
    
            'tarjeta.required' => 'El número de tarjeta es obligatorio.',
            'tarjeta.numeric' => 'El campo deben ser únicamente números',
            'tarjeta.digits' => 'Debes ingresar 16 digitos',
            'mes_exp.required' => 'El mes de expiración es obigatorio',
            'mes_exp.numeric' => 'El mes de expiración debe ser numérico',
            'mes_exp.digits' => 'El mes de expiración son solo 2 digitos',
            'mes_exp.min' => 'El mes de expiración es mínimo 1',
            'mes_exp.max' => 'El mes de expiración es máximo 12',
            'year_exp.required' => 'El año de expiración es obigatorio',
            'year_exp.digits' => 'El año de expiración son los últimos 2 digitos',
            'year_exp.min' => 'El año de expiración es mínimo 24',
            'year_exp.max' => 'El año de expiración es máximo 35',
            'cvv.required' => 'El cvv es obligatorio',
            'cvv.numeric' => 'El cvv debe ser numérico',
            'cvv.digits' => 'El cvv son solo 3 digitos',
            
            
        
        ];
    }
}

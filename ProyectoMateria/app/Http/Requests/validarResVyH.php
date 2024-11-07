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
}

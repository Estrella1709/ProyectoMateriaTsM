<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validarEditResH extends FormRequest
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
            'habitaciones'=>'required | numeric | digits_between:1,5',
            'ingreso'=>'required | date',
            'salida'=>'required | date',
        ];
    }
}

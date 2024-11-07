<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validarEditUsuarios extends FormRequest
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
            'nuevo_n'=>'required | regex:/^[\pL\s]+$/u|min:2|max:100',
            'nuevo_c'=>'required | email:rfc,dns',
            'nuevo_t'=>'required | numeric | digits:10',
        ];
    }
}

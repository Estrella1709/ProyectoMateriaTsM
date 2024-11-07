<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validarNuevapwd extends FormRequest
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
            'codigo'=>'required | max:6 | min:6',
            'pwdnueva'=>'required | min:8',
            'confnueva'=>'required | min:8',
        ];
    }
}

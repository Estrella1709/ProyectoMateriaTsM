<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validarRegistro extends FormRequest
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
            'nombreRegistro'=>'required|regex:/^[\pL\s]+$/u|min:2|max:100',
            'apRegistro'=>'required|regex:/^[\pL\s]+$/u|min:2|max:100',
            'mailRegistro'=>'required | email:rfc,dns',
            'telRegistro'=> 'required | numeric | digits:10',
            'pwdRegistro'=>'required | min:8',
        ];
    }
}

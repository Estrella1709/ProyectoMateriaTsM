<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validadorDH extends FormRequest
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

            'fechaR' => 'required|date',
            

        ];
    }

    public function messages()
    {
        return [
    
            'fechaR.required' => 'El campo de fecha de reserva es obligatorio.',
            'fechaR.date' => 'La fecha de reserva debe ser una fecha válida.',
            
        
        ];
    }
}

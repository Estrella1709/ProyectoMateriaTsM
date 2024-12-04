<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validarAgregarHotel extends FormRequest
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
            "nombre_h"=> 'required | regex:/^[\pL\s]+$/u | min:5 | max:75',
            "estrellas"=> 'required | integer | max:5',
            "capacidad"=> 'required | integer | max:10001',
            "precio_n"=> 'required | numeric | max:1000001',
            "ubicacion" => 'required',
            "dist_centro" => 'required | numeric | max:1000',
            "wifi" => 'required',
            "desayuno" => 'required',
            "piscina" => 'required',
            "txtDesc_h" => 'required | max:255',

        ];
    }
}

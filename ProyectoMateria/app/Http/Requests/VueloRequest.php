<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VueloRequest extends FormRequest
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
            'id_origen' => 'required|exists:ubicaciones,id_ubicacion',
            'id_destino' => 'required|exists:ubicaciones,id_ubicacion|different:id_origen',
            'id_aerolinea' => 'required|exists:aerolineas,id_aerolinea',
            'fecha_salida' => 'required|date|after_or_equal:today',
            'fecha_regreso' => 'nullable|date|after_or_equal:fecha_salida',
            'horario_salida' => 'required|date_format:H:i',  // 24-hour format
            'horario_llegada' => 'required|date_format:H:i|after:horario_salida',
            'capacidad' => 'required|integer|min:1|max:1000',
            'pasajeros' => 'required|integer|min:0|lte:capacidad',
            'precio' => 'required|numeric|min:0',
            'escalas' => 'nullable|string|max:250',
            'disponibilidad_asientos' => 'required|integer|min:0|lte:capacidad'
        ];
    }

    public function messages(): array
    {
        return [
            'id_origen.required' => 'El origen es obligatorio',
            'id_origen.exists' => 'El origen seleccionado no es válido',
            'id_destino.required' => 'El destino es obligatorio',
            'id_destino.exists' => 'El destino seleccionado no es válido',
            'id_destino.different' => 'El destino debe ser diferente al origen',
            'id_aerolinea.required' => 'La aerolínea es obligatoria',
            'id_aerolinea.exists' => 'La aerolínea seleccionada no es válida',
            'fecha_salida.required' => 'La fecha de salida es obligatoria',
            'fecha_salida.after_or_equal' => 'La fecha de salida debe ser hoy o posterior',
            'fecha_regreso.after_or_equal' => 'La fecha de regreso debe ser posterior a la fecha de salida',
            'horario_salida.required' => 'El horario de salida es obligatorio',
            'horario_salida.date_format' => 'El formato del horario de salida no es válido',
            'horario_llegada.required' => 'El horario de llegada es obligatorio',
            'horario_llegada.date_format' => 'El formato del horario de llegada no es válido',
            'horario_llegada.after' => 'El horario de llegada debe ser posterior al horario de salida',
            'capacidad.required' => 'La capacidad es obligatoria',
            'capacidad.min' => 'La capacidad debe ser al menos 1',
            'capacidad.max' => 'La capacidad no puede exceder 1000',
            'pasajeros.required' => 'El número de pasajeros es obligatorio',
            'pasajeros.min' => 'El número de pasajeros no puede ser negativo',
            'pasajeros.lte' => 'El número de pasajeros no puede exceder la capacidad',
            'precio.required' => 'El precio es obligatorio',
            'precio.min' => 'El precio no puede ser negativo',
            'escalas.max' => 'La descripción de escalas no puede exceder 250 caracteres',
            'disponibilidad_asientos.required' => 'La disponibilidad de asientos es obligatoria',
            'disponibilidad_asientos.min' => 'La disponibilidad no puede ser negativa',
            'disponibilidad_asientos.lte' => 'La disponibilidad no puede exceder la capacidad'
        ];
    }
}

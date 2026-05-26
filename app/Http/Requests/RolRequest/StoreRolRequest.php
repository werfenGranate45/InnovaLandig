<?php

namespace App\Http\Requests\RolRequest;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRolRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "nombreRol" => ['required', 'max:50', 'unique:roles,nombreRol'],
            "privilegios" => ['required', 'json'],
            "descripcion" => ['max:50']
        ];
    }

    /**
     * Mensajes de customizacion para los errores presentados
     */
    public function messages()
    {
        return [
            "nombreRol.required" => "El nombre del rol es necesario",
            "nombreRol.max" => "El nombre debe tener un maximo de 50 caracteres",

            "privilegios.required" => "Se ocupan los privilegios",
            "privilegios.json" => "Se necesita que es un JSON",

            "descripcion.max" => "La descripcion no debe execeder las 50 caracteres"
        ];
    }
}

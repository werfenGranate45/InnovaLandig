<?php

namespace App\Http\Requests\RolRequest;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRolRequest extends FormRequest
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
            "nombreRol" => ['sometimes', 'max:50', Rule::unique('roles', 'nombreRol')->ignore($this->route('rol'),'id')],
            "privilegios" => ['sometimes', 'json'],
            "descripcion" => ['max:50']
        ];
    }

    /**
     * Mensajes de customizacion para los errores presentados
     */
    public function messages()
    {
        return [
            "nombreRol.unique" => "El nombre ya existe en nuestro sistema",
            "nombreRol.max" => "El nombre debe tener un maximo de 50 caracteres",

            "descripcion.max" => "La descripcion no debe execeder las 50 caracteres"
        ];
    }
}

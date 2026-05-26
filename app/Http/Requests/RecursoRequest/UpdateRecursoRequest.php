<?php

namespace App\Http\Requests\RecursoRequest;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRecursoRequest extends FormRequest
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
            "usuario_id" => [
                'required',
                'integer',
                'exists:usuarios,id'
            ],

            "categoria_recurso_id" => [
                'required',
                'integer',
                'exists:categoria_recursos,id'
            ],

            "tipo_recurso_id" => [
                'required',
                'integer',
                'exists:tipo_recursos,id'
            ],

            "rutaArchivo" => [
                'required',
                'string',
                'max:255'
            ],

            "titulo" => [
                'required',
                'string',
                'max:200'
            ],

            "descripcion" => [
                'required',
                'string'
            ],

            "estado" => [
                'sometimes',
                'boolean'
            ]
        ];
    }

    public function messages(): array
    {
        return [

            // usuario_id
            "usuario_id.required" => "El usuario es obligatorio",
            "usuario_id.integer" => "El id del usuario debe ser un numero entero",
            "usuario_id.exists" => "El usuario seleccionado no existe",

            // categoria_recurso_id
            "categoria_recurso_id.required" => "La categoria es obligatoria",
            "categoria_recurso_id.integer" => "El id de la categoria debe ser un numero entero",
            "categoria_recurso_id.exists" => "La categoria seleccionada no existe",

            // tipo_recurso_id
            "tipo_recurso_id.required" => "El tipo de recurso es obligatorio",
            "tipo_recurso_id.integer" => "El id del tipo de recurso debe ser un numero entero",
            "tipo_recurso_id.exists" => "El tipo de recurso seleccionado no existe",

            // rutaArchivo
            "rutaArchivo.required" => "La ruta del archivo es obligatoria",
            "rutaArchivo.string" => "La ruta del archivo debe ser texto",
            "rutaArchivo.max" => "La ruta del archivo no puede exceder 255 caracteres",

            // titulo
            "titulo.required" => "El titulo es obligatorio",
            "titulo.string" => "El titulo debe ser texto",
            "titulo.max" => "El titulo no puede exceder 200 caracteres",

            // descripcion
            "descripcion.required" => "La descripcion es obligatoria",
            "descripcion.string" => "La descripcion debe ser texto",

            // estado
            "estado.boolean" => "El estado debe ser verdadero o falso"
        ];
    }
}

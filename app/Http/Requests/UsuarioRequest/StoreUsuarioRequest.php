<?php

namespace App\Http\Requests\UsuarioRequest;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class StoreUsuarioRequest extends FormRequest
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
            "nombre" => [
                'required',
                'string',
                'max:150'
            ],

            "rol_id" => [
                'required',
                'integer',
                'exists:roles,id'
            ],

            "apellidoPaterno" => [
                'required',
                'string',
                'max:150'
            ],

            "apellidoMaterno" => [
                'nullable',
                'string',
                'max:150'
            ],

            "correo" => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:usuarios,correo'
            ],

            "password" => [
                'required',
                'string',
                'min:8',
                'max:20',
                'regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[^A-Za-z\d]).+$/'
            ],

            "estado" => [
                'sometimes',
                'boolean'
            ]
        ];
    }

    /**
     * Mensajes personalidas de error que se mostrarn en el front
     */
    public function messages()
    {
        return [

            // Nombre
            "nombre.required" => "El nombre es requerido",
            "nombre.string" => "El nombre debe ser texto",
            "nombre.max" => "El nombre no debe tener un maximo de 150 caracteres",

            // Rol
            "rol_id.required" => "Es necesario un id rol",
            "rol_id.integer" => "El id del rol debe ser un numero entero",
            "rol_id.exists" => "Debe existir el id para vincular",

            // Apellido paterno
            "apellidoPaterno.required" => "El apellido paterno es necesario",
            "apellidoPaterno.string" => "El apellido paterno debe ser texto",
            "apellidoPaterno.max" => "El apellido paterno no debe tener un maximo de 150 caracteres",

            // Apellido materno
            "apellidoMaterno.string" => "El apellido materno debe ser texto",
            "apellidoMaterno.max" => "El apellido materno no debe tener mas de 150 caracteres",

            // Correo
            "correo.required" => "El correo es requerido",
            "correo.string" => "El correo debe ser texto",
            "correo.email" => "El correo debe tener un formato valido",
            "correo.max" => "El correo no debe exceder 255 caracteres",
            "correo.unique" => "Ya existe un correo en nuestro sistema",

            // Password
            "password.required" => "La contraseña es requerida",
            "password.string" => "La contraseña debe ser texto",
            "password.min" => "La longitud minima debe ser 8 caracteres",
            "password.max" => "La longitud maxima debe ser de 20 caracteres",
            "password.regex" => "La contraseña debe contener al menos una letra, un numero y un simbolo",

            // Estado
            "estado.boolean" => "El estado debe ser verdadero o falso"
        ];
    }
}

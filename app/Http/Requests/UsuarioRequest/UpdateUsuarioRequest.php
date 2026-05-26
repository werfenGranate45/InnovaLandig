<?php

namespace App\Http\Requests\UsuarioRequest;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUsuarioRequest extends FormRequest
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
            "nombre" => ['sometimes', 'max:150'],
            "apellidoPaterno" => ['sometimes', 'max:150'],
            "apellidoMaterno" => ['sometimes','max:150'],
            #Para que el nombre lo ignore debe de apuntar al parametro para ignorar, si usas ApiResorce entoces es el nombre de la ruta 
            "correo" => ['sometimes','email', Rule::unique('usuarios','correo')->ignore($this->route('usuario'))],
            "password" => ['sometimes', 'min:8', 'max:20', 'regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[^A-Za-z\d]).+$/']
        ];
    }

    /**
     * Mensajes personalidas de error que se mostrarn en el front
     */
    public function messages()
    {
        return [
            #Mensaje para el nombre
            "nombre.max" => "El nombre no debe de tener un maximo de 150 caracteres",
            
            #Mensajes para el apellido paterno
            
            "apellidoPaterno.max" => "El nombre no debe tener un maximo de 150",
            
            #Mensajes de error para el apellido materno
            "apellidoMaterno.max" => "El apellido materno no debe tener mas de 150",
            
            #Mensajes para el correo 
            "correo.unique" => "Ya existe un correo en nuestro sistema",

            #Mesajes para la contraseña 
            "password.min" => "La longitud minima debe ser 8 caracteres",
            "password.max" => "La longitud maxima debe ser de 20 caracteres",
            "password.regex" => "La contraseña debe contener al menos una letra, un numero y un simbolo"

        ];
    }
}

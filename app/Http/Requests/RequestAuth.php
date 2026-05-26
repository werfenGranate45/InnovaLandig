<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class RequestAuth extends FormRequest
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
            "correo" => ['required', 'email'],
            "password" => ['required', 'min:8', 'max:20', 'regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[^A-Za-z\d]).+$/']
        ]; 
    }

    #[Override]
    public function messages()
    {
        return [
            "correo.required" => "El correo es requerido",
            "correo.email1" => "Debe ser un correo electronico",

            #Mesajes para la contraseña 
            "password.required" => "La contraseña es requerida",
            "password.min" => "La longitud minima debe ser 8 caracteres",
            "password.max" => "La longitud maxima debe ser de 20 caracteres",
            "password.regex" => "La contraseña debe contener al menos una letra, un numero y un simbolo"
        ];
    }
}

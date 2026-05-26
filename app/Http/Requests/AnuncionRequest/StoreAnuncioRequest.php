<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class StoreAnuncioRequest extends FormRequest
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
            "usuario_id" => ['required', 'exists:usuarios,id'],
            "urgencia_anuncio_id" => ['required', 'exists:urgencia_anuncio,id'],
            "titulo" => ['required', 'max:200'],
            "cuerpo" => ['required', 'max:500'],
            "fechaProgramada "=> ['sometimes', 'date'],
            "fechaExpiracion"=> ['sometimes', 'date'],
            "estado"=> ['sometimes', 'boolean']
        ];
    }

    #[Override]
    public function messages()
    {
        return [
            #Validacion para el campo de usuarios existe,
            "usuario_id.required" => "El usuario es requerido",
            "usuario_id.existe" => "El usuario debe existir en la base de datos",
            #Urgencia_anuncio_id
            "urgencia_anuncio_id.required" => "La urgencia es requerida",
            "urgencia_anuncio_id.exists" => "La urgencia debe existir en la base de datos",

            #Titulo mensajes de error personalizados

            "titulo.required" => "El titlo debe ser solicitado",
            "titulo.max" => "El titulo no debe exceder los 200 caracteres",

            #Cuerpo mensajes de error

            "cuerpo.required" => "El cuerpo del anuncio es requerido",
            "cuerpo.max" => "El numero de caracteres no debe pasar de los 500",

            #Fecha programada mensajes de error
            "fechaProgramada.date" => "Debe tener un formato de tipo fecha ",
            "fechaExpiracion.date" => "Debe tener un formato de tipo fecha",

            "estado.boolean" => "Debe ser un booleano"
        ];
    }
}

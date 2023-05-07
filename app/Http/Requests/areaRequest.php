<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class areaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'descripcion'=>['bail','required','regex:/^[a-zA-Z\s áéíóúÁÉÍÓÚñÑ ()]+$/u','min:3','max:60'],
            'ponderacion'=>['bail','required','numeric']
        ];
    }
    public function messages(){
        return[
            'descripcion.required'=> 'El nombre de area es obligatorio',
            'descripcion.regex'=>'Solo se aceptan caracteres literales',
            'ponderacion.required'=>'La ponderacion es obligatoria',
            'ponderación.numeric'=> 'La ponderacion debe ser un número'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class areaEditRequest extends FormRequest
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
            'EditDescripcion'=>['bail','required','regex:/^[a-zA-Z\s áéíóúÁÉÍÓÚñÑ ()]+$/u','min:3','max:60'],
            'EditPonderacion'=>['bail','required','numeric']
        ];
    }

    public function messages(){
        return[
            'EditDescripcion.required'=> 'El nombre de area es obligatorio',
            'EditDescripcion.regex'=>'Solo se aceptan caracteres literales',
            'EditPonderacion.required'=>'La ponderacion es obligatoria',
            'EditPonderacion.numeric'=> 'La ponderacion debe ser un número'
        ];
    }
}

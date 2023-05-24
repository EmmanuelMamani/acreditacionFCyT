<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class carreraRequest extends FormRequest
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
            'name'=>["required",'regex:/^[a-zA-Z\s áéíóúÁÉÍÓÚñÑ]+$/u'],
            'codigo'=>['required','integer','unique:carreras,codigo']
        ];
    }

    public function messages(){
        return[
            'name.required'=> 'El nombre de carrera es obligatorio',
            'name.regex'=>'Solo se aceptan caracteres literales',
            'codigo.required'=>'El codigo es obligatorio',
            'codigo.integer'=> 'El codigo debe ser un numero entero',
            'codigo.unique'=> 'Ya existe una carrera con ese codigo'
        ];
    }
}

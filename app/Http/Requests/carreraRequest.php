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
            'name'=>["required","string"],
            'codigo'=>['required','integer']
        ];
    }

    public function messages(){
        return[
            'name.required'=> 'el nombre de carrera es obligatorio',
            'name.string'=>'Solo se aceptan caracteres literales',
            'codigo.required'=>'El codigo es obligatorio',
            'codigo.integer'=> 'El codigo debe ser un numero entero'
        ];
    }
}

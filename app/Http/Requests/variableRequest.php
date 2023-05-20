<?php

namespace App\Http\Requests;

use App\Rules\numeroVariable;
use Illuminate\Foundation\Http\FormRequest;

class variableRequest extends FormRequest
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
            'numero_variable'=>['bail','required','integer','between:0,100',new numeroVariable($this->route('id'))]
        ];
    }

    public function messages(){
        return[
            'descripcion.required'=> 'El nombre de area es obligatorio',
            'descripcion.regex'=>'Solo se aceptan caracteres literales',
            'descripcion.min'=>'El tamaño del nombre debere ser min 3',
            'descripcion.max'=>'El tamaño del nombre debere ser max 60',
            'numero_variable.required'=>'El campo es obligatorio',
            'numero_variable.integer'=> 'El campo debe ser un número entero',
            'numero_variable.between'=> 'El debe ser un número mayor a 0'
        ];
    }
}

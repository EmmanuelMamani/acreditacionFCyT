<?php

namespace App\Http\Requests;

use App\Rules\numeroArea;
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
            'descripcion'=>['bail','required','regex:/^[a-zA-Z\s áéíóúÁÉÍÓÚñÑ 0-9]+$/u','min:3','max:60'],
            'ponderacion'=>['bail','required','numeric','between:0,10'],
            'numero'=>['bail','required','integer',new numeroArea]
        ];
    }
    public function messages(){
        return[
            'descripcion.required'=> 'El nombre de variable es obligatorio',
            'descripcion.regex'=>'Solo se aceptan caracteres literales',
            'descripcion.min'=>'El tamaño del nombre debere ser min 3',
            'descripcion.max'=>'El tamaño del nombre debere ser max 60',
            'ponderacion.required'=>'La ponderación es obligatoria',
            'ponderacion.numeric'=> 'El campo debe ser un número',
            'ponderacion.between'=> 'La ponderacion debe ser un número mayor a 0 y menor que 10',
            'numero.required'=>'El numero de area es obligatorio',
            'numero.integer'=>'El numero de area tiene que ser entero'
        ];
    }
}

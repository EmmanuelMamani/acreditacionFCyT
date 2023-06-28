<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class indicadorRequest extends FormRequest
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
            'numero_indicador'=>['bail','required','integer','between:0,100'],
            'descripcion'=>['bail','required','string','min:3'],
            'criterios'=>['bail','required']
        ];
    }

    public function messages(){
     
        return [
             'descripcion.required'=> 'El nombre de variable es obligatorio',
             'descripcion.string'=>'Solo se aceptan caracteres literales',
             'descripcion.min'=>'El tamaño del nombre debere ser min 3',
             'descripcion.max'=>'El tamaño del nombre debere ser max 300',
             'numero_indicador.required'=>'El campo es obligatorio',
             'numero_indicador.integer'=> 'El campo debe ser un número entero',
             'numero_indicador.between'=> 'El debe ser un número mayor a 0',
             'criterios.required'=>'Debe elegir minimamente un criterio'
         ];
 
     }

}

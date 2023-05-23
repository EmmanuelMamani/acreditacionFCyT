<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class indicadorEditRequest extends FormRequest
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

    public function prepareForValidation()
    {
        $this->merge([
            'id'=>$this->route('id').''
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'EditNumero_indicador'=>['bail','required','integer','between:0,100'],
            'EditDescripcion'=>['bail','required','string','min:3'],
            'EditCriterios'=>['bail','required'],
            'id'=>'required',
        ];
    }

    public function messages(){
     
        return [
             'EditDescripcion.required'=> 'El nombre de variable es obligatorio',
             'EditDescripcion.string'=>'Solo se aceptan caracteres literales',
             'EditDescripcion.min'=>'El tamaño del nombre debere ser min 3',
             
             'EditNumero_indicador.required'=>'El campo es obligatorio',
             'EditNumero_indicador.integer'=> 'El campo debe ser un número entero',
             'EditNumero_indicador.between'=> 'El debe ser un número mayor a 0',
             'EditCriterios.required'=>'Debe elegir minimamente un criterio',
             'id.required'=>$this->route('id')
         ];
 
     }

     public function withValidator(Validator $validator)
     {
        
         $validator->after(function ($validator) {
             if ($this->hasErrorsInFields(['EditDescripcion', 'EditNumero_indicador','EditCriterios'])) {
                 $validator->errors()->add('id', $this->route('id'));
             }
         });
     }
 
     private function hasErrorsInFields($fields)
     {
        
         $errors = $this->validator->errors();
 
         foreach ($fields as $field) {
             if ($errors->has($field)) {
                 return true;
             }
         }
         return false;
     }
}

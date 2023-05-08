<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class indicadorEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
            'numero_indicador'=>['bail','required','integer','between:0,100'],
            'descripcion'=>['bail','required','regex:/^[a-zA-Z\s áéíóúÁÉÍÓÚñÑ ()]+$/u','min:3','max:60'],
            'id'=>'required',
        ];
    }

    public function messages(){
     
        return [
             'descripcion.required'=> 'El nombre de variable es obligatorio',
             'descripcion.regex'=>'Solo se aceptan caracteres literales',
             'descripcion.min'=>'El tamaño del nombre debere ser min 3',
             'descripcion.max'=>'El tamaño del nombre debere ser max 60',
             'numero_indicador.required'=>'El campo es obligatorio',
             'numero_indicador.integer'=> 'El campo debe ser un número entero',
             'numero_indicador.between'=> 'El debe ser un número mayor a 0',
         ];
 
     }

     public function withValidator(Validator $validator)
     {
        
         $validator->after(function ($validator) {
             if ($this->hasErrorsInFields(['descripcion', 'numero_indicador'])) {
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

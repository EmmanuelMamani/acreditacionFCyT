<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class variableEditRequest extends FormRequest
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
        return[
            
            'EditDescripcion'=>['bail','required','regex:/^[a-zA-Z\s áéíóúÁÉÍÓÚñÑ ()]+$/u','min:3','max:60'],
            'EditNumero_variable'=>['bail','required','integer','between:0,100'],
          
            'id'=>['required'],
        ];      
       
    }

    public function messages(){
     
       return [
            'EditDescripcion.required'=> 'El nombre de variable es obligatorio',
            'EditDescripcion.regex'=>'Solo se aceptan caracteres literales',
            'EditDescripcion.min'=>'El tamaño del nombre debere ser min 3',
            'EditDescripcion.max'=>'El tamaño del nombre debere ser max 60',
            'EditNumero_variable.required'=>'El campo es obligatorio',
            'EditNumero_variable.integer'=> 'El campo debe ser un número entero',
            'EditNumero_variable.between'=> 'El debe ser un número mayor a 0',
          
            'id.required'=>$this->route('id')
        ];

    }


    public function withValidator(Validator $validator)
    {
       
        $validator->after(function ($validator) {
            if ($this->hasErrorsInFields(['EditDescripcion', 'EditNumero_variable'])) {
              
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

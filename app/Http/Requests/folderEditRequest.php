<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class folderEditRequest extends FormRequest
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
            'editNombre'=>['bail','required','regex:/^[a-zA-Z\s áéíóúÁÉÍÓÚñÑ 0-9 ,.:_]+$/u','max:100','min:2','unique:archivos,nombre,'.$this->route('id')],
            'id'=>'required'
        ];
    }

    public function messages(){
        return[
            'editNombre.required'=> 'El nombre del folder es obligatorio',
            'editNombre.regex'=>'Solo se aceptan caracteres y números',
            'editNombre.min'=>'El tamaño del nombre debere ser min 3',
            'editNombre.max'=>'El tamaño del nombre debere ser max 100',
            'editNombre.unique'=>'Ya existe un folder con ese nombre',
            'id.required'=>$this->route('id')
        ];
    }

    public function withValidator(Validator $validator)
     {
        
         $validator->after(function ($validator) {
             if ($this->hasErrorsInFields(['editNombre'])) {
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

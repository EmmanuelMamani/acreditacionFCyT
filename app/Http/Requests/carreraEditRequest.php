<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class carreraEditRequest extends FormRequest
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
            'nameE'=>["required",'regex:/^[a-zA-Z\s áéíóúÁÉÍÓÚñÑ ]+$/u'],
            'id'=>['required'],
        ];
    }

    public function messages(){
        return[
            
            'nameE.required'=> 'El nombre de carrera es obligatorio',
            'nameE.regex'=>'Solo se aceptan caracteres literales',
            'id.required'=>$this->route('id')
        ];
    }

    public function withValidator(Validator $validator)
    {
       
        $validator->after(function ($validator) {
            if ($this->hasErrorsInFields(['nameE'])) {
              
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

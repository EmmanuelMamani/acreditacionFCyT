<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
class reporteRequest extends FormRequest
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
            'Tabla'=>'bail|required_without_all:Roseta,Barras',
            'id'=>'required'
        ];
    }

    public function withValidator(Validator $validator)
    {
       
        $validator->after(function ($validator) {
            if ($this->hasErrorsInFields(['Tabla'])) {
              
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

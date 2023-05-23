<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class rolRequest extends FormRequest
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
            'name'=>['bail',"required",'regex:/^[a-zA-Z\s áéíóúÁÉÍÓÚñÑ]+$/u'],
        ];
    }

    public function messages(){
        return[
            'name.required'=> 'El nombre de rol es obligatorio',
            'name.regex'=>'Solo se aceptan caracteres literales',
        ];
    }
}

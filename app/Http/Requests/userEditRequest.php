<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userEditRequest extends FormRequest
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
            'name'=>['required','string'],
            'password'=>['required']
        ];
    }
    public function messages(){
        return[
            'name.required'=> 'el nombre de usuario es obligatorio',
            'name.string'=>'Solo se aceptan caracteres literales',
            'password.required'=>'La contraseña es obligatoria',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userRequest extends FormRequest
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
            'name'=>['required','string','unique:users,name'],
            'email'=>['required','unique:users,email'],
            'password'=>['required','same:confirmacion']
        ];
    }
    public function messages(){
        return[
            'name.required'=> 'el nombre de usuario es obligatorio',
            'name.string'=>'Solo se aceptan caracteres literales',
            'name.unique'=>'Ya existe un usuario con ese nombre',
            'email.required'=>'El email es obligatorio',
            'email.unique'=>'Ya existe un usuario con ese email',
            'password.required'=>'La contraseña es obligatoria',
            'password.same'=>'La contraseña no es la misma'
        ];
    }
}

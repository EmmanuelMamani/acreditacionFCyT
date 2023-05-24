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
            'name'=>['bail','required','regex:/^[a-zA-Z\s áéíóúÁÉÍÓÚñÑ]+$/u'],
            'email'=>['bail','required','unique:users,email'],
            'password'=>['bail','required','same:confirmacion','min:5']
        ];
    }
    public function messages(){
        return[
            'name.required'=> 'El nombre de usuario es obligatorio',
            'name.regex'=>'Solo se aceptan caracteres literales',
            'email.required'=>'El email es obligatorio',
            'email.unique'=>'Ya existe un usuario con ese email',
            'password.required'=>'La contraseña es obligatoria',
            'password.same'=>'La contraseña no es la misma',
            'password.min'=>'Debe tener un tamaño min de 5 caracteres'
        ];
    }

   
}

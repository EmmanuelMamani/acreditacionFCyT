<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nameE'=>["required",'regex:/^[a-zA-Z\s áéíóúÁÉÍÓÚñÑ ]+$/u'],
        ];
    }

    public function messages(){
        return[
            'nameE.regex'=> 'El nombre de carrera es obligatorio',
            'nameE.string'=>'Solo se aceptan caracteres literales',
        ];
    }
}

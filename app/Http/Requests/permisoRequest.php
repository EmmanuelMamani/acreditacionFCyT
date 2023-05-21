<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class permisoRequest extends FormRequest
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
            'url'=>['required','unique:permisos,url']
        ];
    }
    public function messages(){
        return[
            'url.required'=>'La URL es obligatorio',
            'url.unique'=>'Y existe un permiso con esa URL'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class folderRequest extends FormRequest
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
            'nombre_archivo'=>['bail','required','regex:/^[a-z A-Z \s 0-9 áéíóú ÁÉÍÓÚñÑ .,:]+$/u','max:100','min:2','unique:archivos,nombre']
        ];
    }

    public function messages(){
        return[
            'nombre_archivo.required'=> 'El nombre del folder es obligatorio',
            'nombre_archivo.regex'=>'Solo se aceptan caracteres y números',
            'nombre_archivo.min'=>'El tamaño del nombre debere ser min 3',
            'nombre_archivo.max'=>'El tamaño del nombre debere ser max 100',
            'nombre_archivo.unique'=>'Ya existe un folder con ese nombre',
        ];
    }
    


}

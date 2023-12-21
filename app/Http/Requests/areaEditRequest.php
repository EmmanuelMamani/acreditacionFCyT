<?php

namespace App\Http\Requests;

use App\Rules\numeroArea;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
class areaEditRequest extends FormRequest
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
            'EditDescripcion'=>['bail','required','regex:/^[a-zA-Z\s áéíóúÁÉÍÓÚñÑ 0-9]+$/u','min:3','max:60'],
            'EditPonderacion'=>['bail','required','numeric'],
            
            'id'=>'required',
        ];
    }

    public function messages(){
        return[
            'EditDescripcion.required'=> 'El nombre de area es obligatorio',
            'EditDescripcion.regex'=>'Solo se aceptan caracteres literales',
            'EditDescripcion.min'=>'El tamaño del nombre debere ser min 3',
            'EditDescripcion.max'=>'El tamaño del nombre debere ser max 60',
            'EditPonderacion.required'=>'La ponderacion es obligatoria',
            'EditPonderacion.numeric'=> 'La ponderacion debe ser un número',
            'id.required'=>$this->route('id').''
        ];
    }
//Luego de la validacion pregunta si los campos tienen algun error con el metodo hasErrorInFields si retorna true adjunta en los errores el mensaje con el id requerido
    public function withValidator(Validator $validator)
    {
       
        $validator->after(function ($validator) {
            if ($this->hasErrorsInFields(['EditDescripcion', 'EditPonderacion'])) {
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

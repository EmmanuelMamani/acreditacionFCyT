<?php

namespace App\Rules;

use App\Models\variable;
use Illuminate\Contracts\Validation\Rule;

class numeroVariable implements Rule
{
    private $idArea;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->idArea=$id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $bool=variable::where('numero_variable',$value)->where('area_id',$this->idArea)->where('activo',1)->get();
             
        return $bool->isEmpty();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El número de variable ya esta en uso';
    }
}

<?php

namespace App\Rules;

use App\Models\indicador;
use Illuminate\Contracts\Validation\Rule;

class numeroIndicador implements Rule
{
    private $idVariable;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->idVariable=$id;
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
        $bool=indicador::where('activo',1)->where('numero_indicador',$value)->where('variable_id',$this->idVariable)->get();
        return $bool;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El numero de indicador esta en uso';
    }
}

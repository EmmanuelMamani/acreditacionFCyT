<?php

namespace App\Rules;

use App\Models\area;
use Illuminate\Contracts\Validation\Rule;

class numeroArea implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
       $bool=area::where('numero_area',$value)->where('activo',1)->get();
        return  $bool->isEmpty();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El número de area esta en uso';
    }
}

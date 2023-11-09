<?php

namespace Modules\Efipix\Rules;

use Illuminate\Contracts\Validation\Rule;

class CpfValidationRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {

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
        return CpfValidationRule::validate($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'O CPF Informado e invalido';
    }

    public static function validate($value)
    {
        $validator = new \LinvixSistemas\ValidadorCpfCnpj\CPF($value);
        return $validator -> isValid();
    }
}

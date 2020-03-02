<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CustomPhoneRegexRule implements Rule
{   

     /** @var string $attribute The attribute of we are validating. */
    public $attribute;

    /** @var string $description The description of the regex format. */
    public $description;

    /** @var string $regex The regex to validate. */
    public $regex;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->regex = $regex;
       // $this->description = $description;
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
    
        return preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{3}$/", $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The Phone Number is invalid';
    }
}

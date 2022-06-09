<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ShortDescForService implements Rule
{
 


/*
|----------------------------------------------------------------------------------------
|                                 __CONSTRUCT METHOD
|----------------------------------------------------------------------------------------
*/
    public function __construct()
    {
        //
    }



/*
|----------------------------------------------------------------------------------------
|                                      PASSES METHOD
|----------------------------------------------------------------------------------------
*/
    public function passes($attribute, $value)
    {
        if (str_word_count($value) >= 25 && str_word_count($value) <= 50) {
            return true;
        }
        return false;
    }



/*
|----------------------------------------------------------------------------------------
|                                   MESSAGE METHOD
|----------------------------------------------------------------------------------------
*/
    public function message()
    {
        return 'Please Write the short description in 25 to 50 words.';
    }
}

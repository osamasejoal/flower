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
        if (str_word_count($value) >= 20 && str_word_count($value) <= 45) {
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
        return 'Please Write between 20 to 45 words.';
    }
}

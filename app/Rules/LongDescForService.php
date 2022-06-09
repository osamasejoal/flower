<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class LongDescForService implements Rule
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
        if (str_word_count($value) >= 100 && str_word_count($value) <= 250) {
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
        return 'Please Write between 100 to 250 words.';
    }
}

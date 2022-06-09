<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class QuoteForTestimonial implements Rule
{
    


/*
|----------------------------------------------------------------------------------------
|                                   __CONSTRUCT METHOD
|----------------------------------------------------------------------------------------
*/
    public function __construct()
    {
        //
    }



/*
|----------------------------------------------------------------------------------------
|                                   PASSES METHOD
|----------------------------------------------------------------------------------------
*/
    public function passes($attribute, $value)
    {
        if (str_word_count($value) >= 10 && str_word_count($value) <= 40) {
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
        return 'Please Write between 10 to 40 words.';
    }
}

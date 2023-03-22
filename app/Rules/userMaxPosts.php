<?php

namespace App\Rules;
use App\Models\post;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class userMaxPosts implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(post::where("user_id",$value)->count()>3){
            $fail('maximum 3 posts per user.');
        }
    }
}

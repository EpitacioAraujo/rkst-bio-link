<?php

namespace App\Rules\Profile;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class HandlerRule implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!preg_match('/^@[a-zA-Z0-9_\-]+$/', $value)) {
            $fail('Deve começar com @, conter apenas letras e numeros sem espaços, você pode user apenas _ e -');
        }
    }
}

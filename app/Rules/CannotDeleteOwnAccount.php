<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CannotDeleteOwnAccount implements Rule
{
    public function passes($attribute, $value)
    {
        // Silinmek istenen kullanıcının ID'si oturum açmış kullanıcının ID'si ile aynı ise doğrulama başarısız olur
        return $value !== auth()->id();
    }

    public function message()
    {
        return 'You cannot delete your own account.';
    }
}

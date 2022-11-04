<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CustomRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    // BUAT VARIABLE BARU UNTUK TAMPUNG DATA DARI LUAR
    public $listUser;
    public $listNama;
    public function __construct($data)
    {
        // Taruh data dari luar ke class
        $this->listUser = $data;

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
        // Mengecek apakah input user (value) ada di listUser atau tidak
        // Kalau ada, return false
        // Kalau gaada, return true
        for($i = 0 ; $i < sizeof($this->listUser); $i++){
            if($this->listUser[$i] == $value)
                return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'KODE TIDAK UNIK!';
    }
}

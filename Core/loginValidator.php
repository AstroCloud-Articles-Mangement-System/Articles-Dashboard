<?php

namespace Core;

class loginValidator
{
    //password
    public static function password($value)
    {
        $value = trim($value);
        if (!preg_match("/^(?=.*[A-Z])(?=.*\d)(?=.*[@!#%&_])[\w@!#%&]{8,}$/", $value)) {
            return false;
        }
        return true;
    }

    public static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}
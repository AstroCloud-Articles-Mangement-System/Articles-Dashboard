<?php

namespace Core\Middleware;

use Core\Authenticator;

class Remembered
{
    public function handle()
    {
        if ($_COOKIE['remember_me_token']) {
            $Auth_val=Authenticator::checkToken($_COOKIE['remember_token']);
            if ($Auth_val) {
                $_SESSION['user'] = $Auth_val; //login
            }
        }
    }
}


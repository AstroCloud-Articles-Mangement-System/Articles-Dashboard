<?php

namespace Core\Middleware;

use Core\Authenticator;

class Remembered
{
    public function handle()
    {
        if (isset($_COOKIE['remember_me_token'])) {
            $Auth_val=Authenticator::checkToken($_COOKIE['remember_me_token']);            
            $_SESSION['user'] = [
                'email' => $Auth_val['email'],
                'role' => $Auth_val['role'],
            ];
        }
    }
}
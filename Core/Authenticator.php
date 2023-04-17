<?php

namespace Core;
use User;
class Authenticator
{
    public function attempt($email, $password)
    {
       
        $user = new User;
        $sql = "SELECT * FROM users WHERE user_email = '$email'";
   
        $foundedUser=$user->get_users_by_any_sql($sql);
        if ($foundedUser) {
            if (password_verify($password, $foundedUser[0]['user_password'])) {
                $this->login([
                    'email' => $email
                ]);
                return true;
            }
        }                var_dump("not verify");


        return false;
    }

    public function login($user)
    {
        $_SESSION['user'] = [
            'email' => $user['email']
        ];

        session_regenerate_id(true);
    }

    public function logout()
    {
        Session::destroy();
    }
}
<?php

namespace Core;

class Authenticator
{
    public function attempt($email, $password)
    {
        $user = new User;
        $sql = "SELECT * FROM users WHERE email = $email";
        $foundedUser=$user->get_users_by_any_sql($sql);
        var_dump($foundedUser);
        if ($foundedUser) {
            if (password_verify($password, $foundedUser['password'])) {
                $this->login([
                    'email' => $email
                ]);

                return true;
            }
        }
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
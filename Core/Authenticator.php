<?php

namespace Core;

use User;

class Authenticator
{
    private $role;

    public function __construct()
    {
        $this->role =  ['admin', 'editor', 'user'];
    }
    public function attempt($email, $password)
    {

        $user = new User;
        $sql = "SELECT * FROM users WHERE user_email = '$email'";

        $foundedUser = $user->get_users_by_any_sql($sql);

        if ($foundedUser) {
            if (password_verify($password, $foundedUser[0]['user_password'])) {
                if ($foundedUser[0]['id'] == 1) { //admin group
                    $this->login([
                        'email' => $email,
                        'role' => $this->role[0],
                    ]);
                } elseif ($foundedUser[0]['id'] == 2) { //editor group
                    $this->login([
                        'email' => $email,
                        'role' =>  $this->role[1],
                    ]);
                } else {
                    $this->login([ //ordinary user
                        'email' => $email,
                        'role' =>  $this->role[2],
                    ]);
                }

                return true;
            }
        }
        var_dump("not verify");


        return false;
    }

    public function login($user)
    {
        $_SESSION['user'] = [
            'email' => $user['email'],
            'role' => $user['role'],
        ];
        session_regenerate_id(true);
    }

    public function logout()
    {
        Session::destroy();
    }
}

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
        $sql = "SELECT * FROM users WHERE user_email = '$email'";
        $foundedUser = User::get_users_by_any_sql($sql);
        if ($foundedUser) {
            if (password_verify($password, $foundedUser[0]['user_password'])) {
                $this->login([
                            'email' => $email,
                            'role' =>  $this->get_role($foundedUser[0]['group_id']),
                 ]);
                return true;
            }
        }
        return false;
    }

    private function get_role($group_id)
    {
        if ($group_id == 1) { //admin group
            return $this->role[0];
        } elseif ($group_id == 2) { //editor group
            return $this->role[1];
        } else {
            return $this->role[2];
        }
    }
    public function login($user)
    {
        $_SESSION['user'] = [
            'email' => $user['email'],
            'role' => $user['role'],
        ];
        session_regenerate_id(true);
    }

    public static function rememberMe($email)
    {
        $token = bin2hex(random_bytes(16)) . "|" . md5($email);
        setcookie('remember_me_token', $token, [
            'expires' => time() + __expire_date_cookie__, //2 days
            'httponly' => true //Httponly flag is a security measure that prevents client-side scripts from accessing the cookie value.
        ]);
        User::update_user_remember_token($email, $token);
    }

    public static function checkToken($token)
    {
        $sql = "SELECT user_email,group_id FROM users WHERE remember_me = '$token'";
        $remembered_user = User::get_users_by_any_sql($sql);
        if ($remembered_user) {
            $obj = new self;
            return ["email"=>$remembered_user[0]['user_email'],"role"=>$obj->get_role($remembered_user[0]['group_id'])];
        }
        return false;
    }

    public static function logout()
    {
        $email = $_SESSION['user']['email'];
        Session::destroy();
        User::update_user_remember_token($email);
    }
}

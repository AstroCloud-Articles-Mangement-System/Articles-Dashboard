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
                if ($foundedUser[0]['group_id'] == 1) { //admin group
                    $this->login([
                        'email' => $email,
                        'role' => $this->role[0],
                    ]);
                } elseif ($foundedUser[0]['group_id'] == 2) { //editor group
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
    
    public static function rememberMe($email)
    {
        $token = bin2hex(random_bytes(16)) . "|" . md5($email);
        setcookie('remember_me_token', $token, [
            'expires' => time() + 48 * 3600, //2 days
            'httponly' => true //Httponly flag is a security measure that prevents client-side scripts from accessing the cookie value.
        ]);
        User::update_user_remember_token($email, $token);
    }
    
    public static function checkToken($token)
    {
        $sql = "SELECT user_email FROM users WHERE remember_me = '$token'";
        $remembered_user = (new user)->get_users_by_any_sql($sql);
        if ($remembered_user) {
            return $remembered_user[0]['user_email'];
        }
        return false;
    }

    public static function logout()
    {     
        $email=$_SESSION['user']['email'];
        Session::destroy();
        User::update_user_remember_token($email);
    }
}
<?php

namespace Core;

class Session
{
    public static function flash($key, $value)
    {
        $_SESSION[$key] = "";
        $_SESSION[$key] = $value;
    }

    public static function flush()
    {
        $_SESSION = [];
    }

    public static function destroy()
    {
        static::flush();
        session_destroy();
        $params = session_get_cookie_params();
        setcookie('remember_me_token', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
}

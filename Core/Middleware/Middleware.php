<?php

namespace Core\Middleware;

use Core\Middleware\Guest;
use Core\Middleware\Authenticated;
use Core\Middleware\Admin;
use Core\Middleware\Editor;
use Core\Middleware\User;
use User as GlobalUser;

class Middleware
{
    public const MAP = [
        'guest' => Guest::class,
        'auth' => Authenticated::class,
        'admin' => Admin::class,
        'editor' => Editor::class,
        'user' => User::class,
    ];

    public static function resolve($key)
    {
        if (!$key) {
            return;
        }

        $middleware = static::MAP[$key] ?? false;

        if (!$middleware) {
            throw new \Exception("No matching middleware found for key '{$key}'.");
        }

        (new $middleware)->handle();
    }
}

<?php

namespace Core\Middleware;

class Editor
{
    public function handle()
    {
        if ($_SESSION['user']['role'] != 'editor') {
            http_response_code(403);
            require base_path("views/pages/errors/403.php");
            die();
        }
    }
}
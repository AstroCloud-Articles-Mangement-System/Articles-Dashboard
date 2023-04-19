<?php

namespace Core\Middleware;

class Editor
{
    public function handle()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'editor') {
            http_response_code(403);
            require base_path("views/pages/errors/403.php");
            die();
        }
    }
}
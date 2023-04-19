<?php
namespace Core\Middleware;

class AdminOrEditor
{
    public function handle()
    {
        if (!in_array($_SESSION['user']['role'], ['admin', 'editor'])) {
            http_response_code(403);
            require base_path("views/pages/errors/403.php");
            die();
        }
    }
}
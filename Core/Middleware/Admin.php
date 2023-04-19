<?php
namespace Core\Middleware;

class Admin
{
    public function handle()
    {
        if ($_SESSION['user']['role'] != 'admin') {
            http_response_code(403);
            require base_path("views/pages/errors/403.php");
            die();
        }
    }
}

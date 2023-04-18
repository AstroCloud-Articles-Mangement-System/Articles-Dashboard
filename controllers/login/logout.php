<?php

use Core\Session;

if (isset($_SESSION['user'])) {
    Session::destroy();
    header('Location: /login');
    exit;
}

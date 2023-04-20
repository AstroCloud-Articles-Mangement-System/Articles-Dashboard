<?php

use Core\Session;
use Core\Authenticator;

if (isset($_SESSION['user'])) {
    Authenticator::logout();
    header('Location: /login');
    exit;
}

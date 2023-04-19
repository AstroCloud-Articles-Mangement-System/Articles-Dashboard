<?php

use Core\Authenticator;
use controllers\login;
use Http\forms\loginForm;
use Core\Session;


require_once('Http/forms/loginForm.php');
require_once('Core/Authenticator.php');
require_once('Core/Session.php');

$email = $_POST['email'];
$password = $_POST['password'];


$form = new loginForm(); // vaildation -->call login-Vaildator file
if ($form->validate($email, $password)) {
    if ((new Authenticator)->attempt($email, $password)) {
        if (isset($_POST['remember_me'])) {
            Authenticator::rememberMe($email);
        }
        $redirect_url = dirname(isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php');
        header('Location: ' . $redirect_url);
        exit;
    }

    $form->error('email', 'No matching account found for that email address and password.');
}
Session::flash('errors', $form->errors());
require 'views/pages/login/login.php';

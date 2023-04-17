<?php

use Core\Authenticator;
use Http\forms\loginForm;

$email = $_POST['email'];
$password = $_POST['password'];


var_dump($email);
// die();
$form = new loginForm(); // vaildation -->call login-Vaildator file

if ($form->validate($email, $password)) {
    if ((new Authenticator)->attempt($email, $password)) {
        var_dump("Auth");
        die();
        header('Location: /');
        exit;
    }
    $form->error('email', 'No matching account found for that email address and password.');
}

//Session::flash('errors', $form->errors());

// $redirect_url = dirname(isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php');
// header('Location: ' . $redirect_url);
// exit;
return header('Location: /login');
;

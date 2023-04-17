<?php

use Core\Authenticator;
use controllers\login;
use Http\forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm(); // vaildation -->call login-Vaildator file

// if ($form->validate($email, $password)) {
//     if ((new Authenticator)->attempt($email, $password)) {
//         redirect('/');
//     }

//     $form->error('email', 'No matching account found for that email address and password.');
// }

// Session::flash('errors', $form->errors());

// return redirect('/login');

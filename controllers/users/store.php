<?php
require('Models/User.php');
$page = "users";
$user = new User;
$errors = [];
$_SESSION['success_message'] = "";
if (isset($_POST['submit'])) {
    $data = [
        $_POST['name'],
        $_POST['email'],
        $_POST['phone'],
        $_POST['user_name'],
        $_POST['user_password'],
        date("Y-m-d"),
        $_POST['group']
    ];
    if (empty($errors)) {
        $_SESSION['success_message'] = "User " . $_POST['name'] . " Created Successfully!!";
    }
    $user->create_user($data);
    $allUsers = $user->get_all_users();
    require 'views/index.php';
}

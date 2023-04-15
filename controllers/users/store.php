<?php
require('Models/User.php');
$page = "users";
$user = new User;
$errors = [];
$_SESSION['success_message'] = "";
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $user_name = $_POST['user_name'];
    $user_password =  password_hash($_POST['user_password'], PASSWORD_DEFAULT);
    $date = date("Y-m-d");
    $group_id = $_POST['group'];
    $data = [
        $name,
        $email,
        $phone,
        $user_name,
        $user_password,
        $date,
        $group_id
    ];
    if (empty($errors)) {
        $_SESSION['success_message'] = "User " . $_POST['name'] . " Created Successfully!!";
    }
    $user->create_user($data);
    $allUsers = $user->get_all_users();
    require 'views/index.php';
}

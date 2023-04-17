<?php
$user = new User;
$errors;
$_SESSION['success_message'] = "";
$_SESSION['error_message'] = "";
if (isset($_POST['submit'])) {
    $errors = validate_user();
    if ($errors == "") {
        $page = "users";
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
        $_SESSION['success_message'] = "User " . $_POST['name'] . " Created Successfully!!";
        $user->create_user($data);
        $allUsers = $user->get_all_users();
    } else {
        $page = "userscreate";
        $group = new Group;
        $allGroups = $group->get_all_groups();
        $_SESSION['error_message'] = $errors;
    }
    require 'views/index.php';
}
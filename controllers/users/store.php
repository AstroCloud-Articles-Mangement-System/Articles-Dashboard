<?php
require('Core/validation.php');
$user = new User;
$errors;
$_SESSION['success_message'] = "";
$_SESSION['error_message'] = "";
if (isset($_POST['submit'])) {
    $errors = validate_user();
    if ($errors == "") {
        // Check if email already exists
        $email = $_POST['email'];
        $sql = "SELECT * FROM users WHERE user_email = '$email'";
        $email_exists = $user->get_email_by_any_sql($sql);
        // var_dump($email_exists);
        // die();
        if ($email_exists) {
            $_SESSION['error_message'] = "Email already exists, please enter another email address";
            $page = "userscreate";
            $group = new Group;
            $allGroups = $group->get_all_groups();
        } else {
            // Create new user
            $page = "users";
            $name = $_POST['name'];
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
            $user->create_user($data);
            $_SESSION['success_message'] = "User " . $_POST['name'] . " Created Successfully!!";
            $allUsers = $user->get_all_users();
        }
    } else {
        $page = "userscreate";
        $group = new Group;
        $allGroups = $group->get_all_groups();
        $_SESSION['error_message'] = $errors;
    }
    $redirect_url = dirname(isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php');
    header('Location: ' . $redirect_url);
    exit;
}

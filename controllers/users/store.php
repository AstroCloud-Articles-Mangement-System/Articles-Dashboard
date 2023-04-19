<?php
require('Core/validation.php');
$user = new User;
$errors;
$_SESSION['success_message'] = "";
$_SESSION['error_message'] = "";
try {
    if (isset($_POST['submit'])) {
        $errors = validate_user();
        if ($errors == "") {
            // Check if email already exists
            $email = $_POST['email'];
            $sql = "SELECT * FROM users WHERE user_email = '$email'";
            $email_exists = User::get_email_by_any_sql($sql);
            if ($email_exists) {
                $_SESSION['error_message'] = "Email already exists, please enter another email address";
                $page = "userscreate";
                $allGroups = Group::get_all_groups();
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
                $allUsers = User::get_all_users();
            }
        } else {
            $page = "userscreate";
            $allGroups = Group::get_all_groups();
            $_SESSION['error_message'] = $errors;
        }
        $redirect_url = dirname(isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php');
        header('Location: ' . $redirect_url);
        exit;
    }
} catch (\Throwable $th) {
    write_to_log_file($th->getMessage(), $th->getFile(), $th->getLine());
}

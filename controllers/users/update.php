<?php
require('Core/validation.php');
$user = new User;
$errors;
$_SESSION['success_message'] = "";
$_SESSION['error_message'] = "";
try {
    if (isset($_POST['_method']) && $_POST['_method'] === 'PUT') {
        $user_id = intval($_POST['user_id']);
        $errors = validate_user();
        if ($errors == "") {
            $page = "users";
            $data = [
                $_POST['name'],
                $_POST['email'],
                $_POST['phone'],
                $_POST['user_name'],
                password_hash($_POST['user_password'], PASSWORD_DEFAULT),
                $_POST['group']
            ];
            try {
                $user->update_user($user_id, $data);
                $allUsers = User::get_all_users();
                $_SESSION['success_message'] = "User " . $_POST['name'] . " Updated Successfully!!";
            } catch (mysqli_sql_exception $exception) {
                $_SESSION['error_message'] = "Error in Updating User";
            }
        } else {
            $page = "user_edit";
            $user = $user->get_user_by_id($user_id);
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

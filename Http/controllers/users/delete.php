<?php

use Core\Session;

$user_id = intval($_GET['id']); // cast the id parameter to an integer

$user = new User();
try {
    if ($user->check_id_existence($user_id)) {
        try {
            $user = $user->delete_user($user_id);
            Session::flash('success_message', "This User Removed Successfully!!");
        } catch (mysqli_sql_exception $exception) {
            Session::flash('error_message', "You can't delete this user, delete related articles first");
            write_to_log_file($exception->getMessage(), $exception->getFile(), $exception->getLine());
        }
    } else {
        Session::flash('error_message', "You can't delete user does not exist in db");
    }
    header("Location: " . $_SERVER['HTTP_REFERER']);
} catch (\Throwable $th) {
    write_to_log_file($th->getMessage(), $th->getFile(), $th->getLine());
}

<?php

use Core\Session;

$user_id = intval($_GET['id']); // cast the id parameter to an integer

$user = new User();
try {
    if ($user->check_id_existence($user_id)) {
        try {
            $user = $user->delete_user($user_id);
            if(!empty($user)){
                Session::flash('success_message', "This User Removed Successfully!!");
            } else{
                Session::flash('error_message', "You Can't Delete this User, Delete related Articles First");
            } 
        } catch (mysqli_sql_exception $exception) {
            Session::flash('error_message', "You Can't Delete this User, Delete related Articles First");
            write_to_log_file($exception->getMessage(), $exception->getFile(), $exception->getLine());
        }
    } else {
        Session::flash('error_message', "You can't Delete user does not exist in db");
    }
    header("Location: " . $_SERVER['HTTP_REFERER']);
} catch (\Throwable $th) {
    write_to_log_file($th->getMessage(), $th->getFile(), $th->getLine());
}
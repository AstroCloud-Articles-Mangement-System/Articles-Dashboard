<?php

use Core\Session;

$group_id = intval($_GET['id']); // cast the id parameter to an integer
$_SESSION['error_message'] = "";
$group = new Group();
try {
    if (($group->check_id_existence($group_id)) && (!$group->Is_Admins_or_Editors_group($group_id))) {
        $groupType = 'ordinary';
        try {
            $group = $group->delete_group($group_id);
            Session::flash('success_message', "This group Removed Successfully!!");
        } catch (mysqli_sql_exception $exception) {
            Session::flash('error_message',  "You can't delete this group, delete related articles first");
            write_to_log_file($exception->getMessage(), $exception->getFile(), $exception->getLine());
        }
    } else {
        Session::flash('error_message',  "You can't delete Admins & Editors groups and the groups that don't exist in db");
    }
    header("Location: " . $_SERVER['HTTP_REFERER']);
} catch (\Throwable $th) {
    write_to_log_file($th->getMessage(), $th->getFile(), $th->getLine());
}

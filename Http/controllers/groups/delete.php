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
            if(!empty($group)){
                Session::flash('success_message', "This group Removed Successfully!!");
            }else{
                Session::flash('error_message',  "You Can't Delete this Group, Delete Participated Users First");
            }
            
        } catch (mysqli_sql_exception $exception) {
            Session::flash('error_message',  "You Can't Delete this Group, Delete Participated Users First");
            write_to_log_file($exception->getMessage(), $exception->getFile(), $exception->getLine());
        }
    } else {
        Session::flash('error_message',  "You Can't Delete Admins & Editors groups and the groups that don't exist in db");
    }
    header("Location: " . $_SERVER['HTTP_REFERER']);
} catch (\Throwable $th) {
    write_to_log_file($th->getMessage(), $th->getFile(), $th->getLine());
}
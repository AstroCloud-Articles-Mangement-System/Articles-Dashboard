<?php

use Core\Session;

$page = "users";
$group = new Group;
$allGroups = Group::get_all_groups();
try {
    if (isset($_GET['group_id']) && $group->check_id_existence($_GET['group_id'])) {
        $group_id = intval($_GET['group_id']);
        $sql = "SELECT u.*,g.group_name FROM `users` u ,`groups` g WHERE u.group_id=g.id && u.group_id = $group_id";
        $allUsers = User::get_users_by_any_sql($sql);
    } elseif (isset($_GET['group_id']) && !$group->check_id_existence($_GET['group_id'])) {
        $allUsers = [];
        Session::flash('error_message', "This Group does not exist in DB");
    } elseif (!isset($_GET['group_id'])) {
        $sql = "SELECT u.*,g.group_name FROM `users` u ,`groups` g WHERE u.group_id=g.id";
        $allUsers = User::get_users_by_any_sql($sql);
    }
    require 'views/index.php';
} catch (\Throwable $th) {
    write_to_log_file($th->getMessage(), $th->getFile(), $th->getLine());
}

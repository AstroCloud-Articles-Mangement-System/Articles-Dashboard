<?php
$page = "users";
$user = new User;
$group = new Group;
$allGroups = $group->get_all_groups();
$allUsers = $user->get_all_users_with_groups();

if (isset($_GET['group_id']) && $group->check_id_existence($_GET['group_id'])) {
    $group_id = intval($_GET['group_id']);
    $sql = "SELECT * FROM users WHERE group_id = $group_id";;
    $allUsers = $user->get_users_by_any_sql($sql);
} elseif (isset($_GET['group_id']) && !$group->check_id_existence($_GET['group_id'])) {
    $allUsers = [];
    $_SESSION['error_message'] = "This Group does not exist in DB";
} elseif (!isset($_GET['group_id'])) {
    $allUsers = $user->get_all_users();
}
require 'views/index.php';
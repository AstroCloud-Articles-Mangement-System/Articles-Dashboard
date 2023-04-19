<?php
$groupData = new Group();
$group_id = intval($_GET['id']);

try {
    if ($groupData->check_id_existence($group_id)) {
        $page = "group_edit";
        $group = $groupData->get_group_by_id($group_id);
    } else {
        $page = "groups";
        $_SESSION['error_message'] = "You Can't Edit Group does not exist in db";
    }
    $allGroups = Group::get_all_groups();
    require 'views/index.php';
} catch (\Throwable $th) {
    write_to_log_file($th->getMessage(), $th->getFile(), $th->getLine());
}
